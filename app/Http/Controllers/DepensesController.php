<?php

namespace App\Http\Controllers;

use App\Components\QueryBuilder\QueryBuilder;
use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\Notification\Notification;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Depenses;

class DepensesController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('motif', 'Motif');
        $tableHelper->setSortable('date', 'Date');
        $tableHelper->setSortable('montant', 'Montant');
        $searchParams = request('q', '');
        $data = Depenses::where("motif", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Depenses::all();
        $searchListDataJSON = [];
        $total = 0;
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->motif;
            $total += $item->montant;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);
        return View::render('Depenses.index', compact('tableHelper','data', 'total' ,'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $depense = new Depenses();
        return View::render('Depenses.form', compact('depense'));
    }

    public function add()
    {
        $data = $_POST;
        $request = Depenses::create($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }

    public function editForm(int $id): string
    {
        $depense = Depenses::find($id);
        return View::render('Depenses.form', compact('depense'));
    }

    public function edit(int $id)
    {
        $data = $_POST;
        $request = Depenses::find($id);
        $request = $request->update($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'success',
                'message' => 'la ressource a été modifié avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'error',
                'message' => 'Erruer lors de la modification de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function delete(int $id)
    {
        $request = (Depenses::find($id))->delete();
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('depense'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

}