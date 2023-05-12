<?php

namespace App\Http\Controllers;

use App\Components\Viewer\View;
use App\Models\Articles;
use App\Models\Categories;

class HomeController
{

    public function index(): string
    {
        $categorie_article = [];
        foreach (Categories::all() as $item) {
            $count = Articles::where('categories_id', $item->id)->count();
            if ($count > 0) {
                $categorie_article[] = [
                    'title' => $item->libelle,
                    'value' => $count
                ];
            }
        }
        $categorie_article = json_encode($categorie_article);
        return View::render('home.index', compact('categorie_article'));
    }

    public function getArticleCategorie(){

    }
}