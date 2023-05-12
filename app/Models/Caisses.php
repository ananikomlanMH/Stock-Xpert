<?php

namespace App\Models;

use App\Helpers\NumberHelper\NumberHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Caisses extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'date',
        'montant',
        'libelle',
        'utilisateurs_id',
    ];

    public function utilisateurs(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }
}