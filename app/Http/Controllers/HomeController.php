<?php

namespace App\Http\Controllers;

use App\Components\Admin\Auth;
use App\Components\Viewer\View;
use App\Models\Approvisionnements;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Depenses;
use App\Models\Factures;
use Illuminate\Support\Carbon;

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

        $situation = [
            "Ventes direct" => [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0,
            ],
            "Approvisionnements" => [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0,
            ],
            "Dépenses" => [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0,
            ],
            "Autres charges" => [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0,
            ],
        ];

        $ventes = Factures::all();
        $appro = Approvisionnements::all();
        $depenses = Depenses::all();

        foreach ($ventes as $item){
            $situation['Ventes direct'][Carbon::parse($item->date)->month] += $item->total();
        }
        foreach ($appro as $item){
            $situation['Approvisionnements'][Carbon::parse($item->date)->month] += $item->total();
        }
        foreach ($depenses as $item){
            $situation['Dépenses'][Carbon::parse($item->date)->month] += $item->montant;
        }

        $situation = json_encode($situation);

        return View::render('home.index', compact('categorie_article', 'situation'));
    }

    public function getArticleCategorie()
    {

    }
}