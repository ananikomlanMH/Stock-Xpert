<?php

namespace App\Http\Controllers;

use App\Components\QueryBuilder\QueryBuilder;
use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\Notification\Notification;
use App\Helpers\NumberHelper\NumberHelper;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Helpers\TableHelper\TableHelper;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\DB;

class UtilisateurController
{

    public function index(): string
    {
        $tableHelper = new TableHelper();
        $tableHelper->setSortable('id', '#');
        $tableHelper->setSortable('nom', 'Nom');
        $tableHelper->setSortable('prenom', 'Prénom');
        $tableHelper->setSortable('telephone', 'Téléphone');
        $tableHelper->setSortable('adresse', 'Adresse');
        $searchParams = request('q', '');

        $data = Utilisateurs::where('nom', "LIKE", '%' . $searchParams . '%')
            ->orderBy($tableHelper->getSort(), $tableHelper->getDir())
            ->paginate((int)request('show', PER_PAGE), ['*'], 'p');

        $searchListData = Utilisateurs::all();
        $searchListDataJSON = [];
        foreach ($searchListData as $item) {
            $searchListDataJSON[] = $item->nom . " ". $item->prenom;

        }
        $searchListDataJSON = json_encode($searchListDataJSON);
        return View::render('settings.Utilisateurs.index', compact('tableHelper','data' ,'searchListDataJSON'));
    }

    public function addForm(): string
    {
        $utilisateur = new Utilisateurs();
        return View::render('settings.Utilisateurs.form', compact('utilisateur'));
    }

    public function add()
    {
        $data = $_POST;
        $request = Utilisateurs::create($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'success',
                'message' => 'la ressource a été crée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'error',
                'message' => 'Erruer lors de la creation de ressource. Veuillez-ressayer plutard!'
            ]);
        }
    }

    public function editForm(int $id): string
    {
        $utilisateur = Utilisateurs::find($id);
        return View::render('settings.Utilisateurs.form', compact('utilisateur'));
    }

    public function edit(int $id)
    {
        $data = $_POST;
        $request = Utilisateurs::find($id);
        $request = $request->update($data);
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'success',
                'message' => 'la ressource a été modifié avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'error',
                'message' => 'Erruer lors de la modification de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

    public function delete(int $id)
    {
        $request = (Utilisateurs::find($id))->delete();
        if ($request){
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'success',
                'message' => 'la ressource a été supprimée avec succès'
            ]);
        }else{
            return ResponseResolverHelper::sendResponse([
                'redirection' => Router::route('settings.utilisateur'),
                'type' => 'error',
                'message' => 'Erruer lors de la suppression de ressource. Veuillez-ressayer plutard !'
            ]);
        }
    }

}