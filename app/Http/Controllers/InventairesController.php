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
use App\Models\Inventaires;
use App\Models\InventairesArticles;
use App\Models\Stocks;
use Dompdf\Dompdf;
use Dompdf\Options;

class InventairesController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('num', 'Num');
        $tableHelper->setSortable('date', 'Date');
        $tableHelper->setSortable('utilisateurs_id', 'Inventoriste');
        $searchParams = request('q', '');
        $data = Inventaires::where("num", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Inventaires::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->num;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('Inventaires.index', compact('tableHelper', 'data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $inventaire = new Inventaires();
        $stock = Stocks::all();
        return View::render('Inventaires.form', compact('inventaire', 'stock'));
    }

    public function add()
    {
        $data = $_POST;

        $inventaire['num'] = (new Inventaires())->getNumeroInventaire();
        $inventaire['date'] = date('Y-m-d H:i');
        $inventaire['utilisateurs_id'] = $_SESSION['id'] ?? 1;

        $request = Inventaires::create($inventaire);
        if ($request) {
            foreach ($data['id'] as $key => $item) {
                $stock = Stocks::find($item);
                $inventaire_ligne = [];
                $inventaire_ligne['inventaires_id'] = $request->id;
                $inventaire_ligne['articles_id'] = $stock->articles->id;
                $inventaire_ligne['qte'] = NumberHelper::removeSpaceToInt($data['qte'][$key]);
                $inventaire_ligne['qte_virtuel'] = $stock->qte_stock;
                InventairesArticles::create($inventaire_ligne);
            }

            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('inventaire'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('inventaire'),
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
        $request = true;
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('inventaire'),
                'type' => 'success',
                'message' => "l'inventaire a été annulée avec succès"
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('inventaire'),
                'type' => 'error',
                'message' => "Erreur lors de l'annulation de l'inventaire. Veuillez-ressayer plutard !"
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
        $inventaire = Inventaires::find($id);
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
//            'setAutoBottomMargin' => 'stretch',
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

        $pdf->setTitle('Inventaire N°' . $inventaire->num);
        $pdf->writeHTML(View::render('Inventaires.print', compact('inventaire', 'configuration')));
        $pdf->output('Inventaire N°' . $inventaire->num.'.pdf', 'I');
    }

}