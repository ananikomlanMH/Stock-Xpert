<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovisionnmentsArticles extends Model {

    public $timestamps = false;

    protected $fillable = [
        'articles_id',
        'approvisionnement_id',
        'pa',
        'qte',
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }
}