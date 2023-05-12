<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacturesArticles extends Model {

    public $timestamps = false;

    protected $fillable = [
        'articles_id',
        'factures_id',
        'pv',
        'qte',
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }
}