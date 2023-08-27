<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventairesArticles extends Model {

    public $timestamps = false;

    protected $fillable = [
        'articles_id',
        'inventaires_id',
        'qte',
        'qte_virtuel',
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }
}