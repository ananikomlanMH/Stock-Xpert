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

class ArticlesController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('libelle', 'Libellé');
        $tableHelper->setSortable('categories_id', 'Catégorie');
        $tableHelper->setSortable('pv', 'Prix de vente');
        $searchParams = request('q', '');
        $data = Articles::where("libelle", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Articles::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->libelle;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('settings.Articles.index', compact('tableHelper','data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $article = new Articles();
        return View::render('settings.Articles.form', compact('article'));
    }

    public function add()
    {
        $data = $_POST;
        $request = Articles::create($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }

    public function editForm(int $id): string
    {
        $article = Articles::find($id);
        return View::render('settings.Articles.form', compact('article'));
    }

    public function edit(int $id)
    {
        $data = $_POST;
        $request = Articles::find($id);
        $request = $request->update($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'success',
                'message' => 'la ressource a été modifié avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'error',
                'message' => 'Erruer lors de la modification de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function delete(int $id)
    {
        $request = (Articles::find($id))->delete();
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.article'),
                'type' => 'error',
                'message' => 'Erreur lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

}