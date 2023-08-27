<?php

namespace App\Http\Controllers;

use App\Components\QueryBuilder\QueryBuilder;
use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\Notification\Notification;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Articles;
use App\Models\Configurations;
use App\Models\Stocks;
use Mpdf\Mpdf;

class StocksController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('articles_id', 'Article');
        $tableHelper->setSortable('qte_alerte', 'Qte Alerte');
        $tableHelper->setSortable('qte_stock', 'Qte Stock');
        $searchParams = request('q', '');

        $data = Stocks::wherehas('articles', function ($query) use ($searchParams) {
            $query->where('libelle', 'like', '%' . $searchParams . '%');
        })->with(['articles' => function ($query) use ($searchParams) {
            $query->where('libelle', 'like', '%' . $searchParams . '%');
        }])->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Articles::all();
        $searchListDataJSON = [];

        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->libelle;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('Stocks.index', compact('tableHelper', 'data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $stock = new Stocks();
        return View::render('Stocks.form', compact('stock'));
    }

    public function add()
    {
        $data = $_POST;
        $request = Stocks::create($data);
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('stock'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('stock'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }


    public function getStock(int $id)
    {
        $data = $_POST;
        $request = Stocks::find($id);
        if ($request) {

            $qte = $request->qte_stock;

            if (!empty($_SESSION['vente_direct'][$request->id]['qte'])) {
                $qte -= $_SESSION['vente_direct'][$request->id]['qte'];
            }

            if ($qte < 0) $qte = 0;

            return $qte;
        }
        return 0;
    }

    public function delete(int $id)
    {
        $request = (Stocks::find($id))->delete();
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('stock'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('stock'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function print()
    {
        $stock = Stocks::all();
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

        $pdf->setTitle('SITUATION DU STOCK');
        $pdf->writeHTML(View::render('Stocks.print', compact('stock', 'configuration')));
        $pdf->output('SITUATION DU STOCK.pdf', 'I');
    }
}