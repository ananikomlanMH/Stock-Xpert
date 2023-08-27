<?php

namespace App\Http\Controllers;

use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Approvisionnements;
use App\Models\ApprovisionnmentsArticles;
use App\Models\Caisses;
use App\Models\Configurations;
use App\Models\Factures;
use App\Models\FacturesArticles;
use App\Models\Stocks;
use Dompdf\Dompdf;
use Dompdf\Options;

class ApprovisionnementsController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('num', 'Num');
        $tableHelper->setSortable('date', 'Date');
        $tableHelper->setSortable('fournisseur', 'Fournisseur');
        $tableHelper->setSortable('utilisateurs_id', 'User');
        $searchParams = request('q', '');
        $data = Approvisionnements::where("num", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Approvisionnements::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->num;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('Approvisionnements.index', compact('tableHelper', 'data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $approvisionnement = new Approvisionnements();
        return View::render('Approvisionnements.form', compact('approvisionnement'));
    }

    public function add()
    {
        $data = $_POST;

        $appro['num'] = (new Approvisionnements())->getNumero();
        $appro['fournisseur'] = $data['fournisseur'];
        $appro['date'] = date('Y-m-d H:i');
        $appro['utilisateurs_id'] = $_SESSION['id'] ?? 1;

        $request = Approvisionnements::create($appro);
        if ($request) {
            foreach ($data['id'] as $key => $item) {

                $stock = Stocks::find($item);
                $appro_ligne = [];
                $appro_ligne['approvisionnements_id'] = $request->id;
                $appro_ligne['articles_id'] = $stock->articles->id;
                $appro_ligne['qte'] = $data['qte'][$key];
                $appro_ligne['pa'] = $data['pa'][$key];

                ApprovisionnmentsArticles::create($appro_ligne);
                $stock->update(['qte_stock' => $stock->qte_stock + intval($appro_ligne['qte'])]);
            }

            unset($_SESSION['appro']);
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro'),
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

        if (empty($_SESSION['appro'][$key])) {
            $_SESSION['appro'][$key] = [
                'id' => $key,
                'article' => $article->libelle,
                'pu' => NumberHelper::removeSpaceToInt($data['price']),
                'qte' => NumberHelper::removeSpaceToInt($data['qte'])
            ];
        } else {
            $_SESSION['appro'][$key]['qte'] += NumberHelper::removeSpaceToInt($data['qte']);
        }

        return ResponseResolverHelper::sendResponse([
            'redirection' => Router::route('appro.addForm'),
            'type' => 'success',
            'message' => 'la ressource a été ajoutée avec succès'
        ]);
    }

    public function deleteArticle(int $id)
    {
        unset($_SESSION['appro'][$id]);
        $request = true;
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro.addForm'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro.addForm'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function remove()
    {
        unset($_SESSION['appro']);
        $request = true;
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro'),
                'type' => 'success',
                'message' => "l'approvisionnment a été annulée avec succès"
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('appro'),
                'type' => 'error',
                'message' => "Erruer lors de l'annulation de l'approvisionnment. Veuillez-ressayer plutard !"
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
        $appro = Approvisionnements::find($id);
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
        $pdf->setTitle('Approvisionnement N°' . $appro->num);
        $pdf->writeHTML(View::render('Approvisionnements.print', compact('appro', 'configuration')));
        $pdf->output('Approvisionnement N°' . $appro->num.'.pdf', 'I');
    }

}