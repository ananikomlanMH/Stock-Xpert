<?php

namespace App\Http\Controllers;

use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Caisses;
use App\Models\Configurations;
use App\Models\Factures;
use App\Models\FacturesArticles;
use App\Models\Stocks;
use Dompdf\Dompdf;
use Dompdf\Options;

class FacturesController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('num', 'Num');
        $tableHelper->setSortable('date', 'Date');
        $tableHelper->setSortable('client', 'Client');
        $tableHelper->setSortable('utilisateurs_id', 'Vendeur');
        $searchParams = request('q', '');
        $data = Factures::where("num", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Factures::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->num;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('Ventes.index', compact('tableHelper', 'data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $facture = new Factures();
        return View::render('Ventes.form', compact('facture'));
    }

    public function add()
    {
        $data = $_POST;
        $facture['num'] = (new Factures())->getNumeroFacture();
        $facture['client'] = $data['client'];
        $facture['date'] = date('Y-m-d H:i');
        $facture['utilisateurs_id'] = $_SESSION['id'] ?? 1;

        $request = Factures::create($facture);
        if ($request) {
            foreach ($data['id'] as $key => $item) {

                $article = Stocks::find($item)->articles;
                $facture_ligne = [];
                $facture_ligne['factures_id'] = $request->id;
                $facture_ligne['articles_id'] = $article->id;
                $facture_ligne['qte'] = $data['qte'][$key];
                $facture_ligne['pv'] = $article->pv;
                FacturesArticles::create($facture_ligne);

                $stock = Stocks::find($item);
                $stock->update(['qte_stock' => $stock->qte_stock - intval($facture_ligne['qte'])]);

            }
            Caisses::create([
                'date' => date('Y-m-d H:i'),
                'montant' => $request->total(),
                'libelle' => 'Vente N°'.$request->num,
                'utilisateurs_id' => $request->utilisateurs_id,
            ]);
            unset($_SESSION['vente_direct']);
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }

    public function addArticle()
    {
        $data = $_POST;
        $key = $data['article'];
        $article = Stocks::find($key)->articles;

        if (empty($_SESSION['vente_direct'][$key])) {
            $_SESSION['vente_direct'][$key] = [
                'id' => $key,
                'article' => $article->libelle,
                'pu' => $article->pv,
                'qte' => NumberHelper::removeSpaceToInt($data['qte'])
            ];
        } else {
            $_SESSION['vente_direct'][$key]['qte'] += NumberHelper::removeSpaceToInt($data['qte']);
        }

        return ResponseResolverHelper::sendResponse([
            'redirection' => Router::route('vente.addForm'),
            'type' => 'success',
            'message' => 'la ressource a été ajoutée avec succès'
        ]);
    }

    public function deleteArticle(int $id)
    {
        unset($_SESSION['vente_direct'][$id]);
        $request = true;
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente.addForm'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente.addForm'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function remove()
    {
        unset($_SESSION['vente_direct']);
        $request = true;
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'success',
                'message' => 'la vente a été annulée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'error',
                'message' => "Erruer lors de l'annulation de la vente. Veuillez-ressayer plutard !"
            ]);
        }
    }

    public function delete(int $id)
    {
        $request = (FacturesArticles::where('factures_id', $id))->delete();
        $request = (Factures::find($id))->delete();
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('vente'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function print(int $id)
    {
        $facture = Factures::find($id);
        $configuration = Configurations::firstOrCreate();

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];


        $pdf = new \Mpdf\Mpdf([
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => $configuration->margin_top,
            'margin_bottom' => $configuration->margin_bottom,
            'margin_header' => 0,
            'margin_footer' => 0,
            'default_font' => 'louisgeorgecafe',
            'fontDir' => array_merge($fontDirs, [
                path_public . '/vendors/font'
            ]),
            'fontdata' => $fontData + [
                    'louisgeorgecafe' => [
                        'R' => 'Louis-George-Cafe.ttf',
                        'B' => 'Louis-George-Cafe-Bold.ttf',
                        'I' => 'Louis George Cafe Italic.ttf',
                    ],
                    'poppins' => [ // must be lowercase and snake_case
                        'R' => 'Poppins-Regular.ttf',
                        'B' => 'Poppins-Bold.ttf',
                        'I' => 'Poppins-Italic.ttf',
                    ]
                ],
        ]);
        $pdf->setTitle('FACTURE N°' . $facture->num);
        $pdf->writeHTML(View::render('Ventes.print', compact('facture', 'configuration')));
        $pdf->output('FACTURE N°' . $facture->num.'.pdf', 'I');
    }

}