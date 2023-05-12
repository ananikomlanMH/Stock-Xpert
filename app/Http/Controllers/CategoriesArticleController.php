<?php

namespace App\Http\Controllers;

use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Articles;
use App\Models\Categories;

class CategoriesArticleController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('libelle', 'Libellé');
        $searchParams = request('q', '');
        $data = Categories::where("libelle", "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Categories::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->libelle;
        }
        $searchListDataJSON = json_encode($searchListDataJSON);

        return View::render('settings.CategoriesArticle.categorie', compact('tableHelper', 'data', 'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $categorie = new Categories();
        return View::render('settings.CategoriesArticle.form', compact('categorie'));
    }

    public function add()
    {
        $data = $_POST;
        $request = Categories::create($data);
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }

    public function editForm(int $id): string
    {
        $categorie = Categories::find($id);
        return View::render('settings.CategoriesArticle.form', compact('categorie'));
    }

    public function edit(int $id)
    {
        $data = $_POST;
        $request = Categories::find($id);
        $request = $request->update($data);
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'success',
                'message' => 'la ressource a été modifié avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'error',
                'message' => 'Erruer lors de la modification de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function delete(int $id)
    {
        $request = (Categories::find($id))->delete();
        if ($request) {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        } else {
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.categorie'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

}