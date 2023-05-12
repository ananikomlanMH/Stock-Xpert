<?php

namespace App\Http\Controllers;

use App\Components\QueryBuilder\QueryBuilder;
use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\Notification\Notification;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Caisses;
use App\Models\Depenses;

class CaissesController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('libelle', 'Libellé');
        $tableHelper->setSortable('date', 'Date');
        $tableHelper->setSortable('montant', 'Montant');
        $tableHelper->setSortable('utilisateurs_id', 'Vendeurs');
        $searchParams = request('q', '');
        $data = Caisses::where("libelle", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Caisses::all();
        $searchListDataJSON = [];
        $total = 0;
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->libelle;
            $total += $item->montant;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);
        return View::render('Caisses.index', compact('tableHelper','data', 'total' ,'searchListDataJSON'));
    }
    }