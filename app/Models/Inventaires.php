<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaires extends Model {

    public $timestamps = false;

    protected $fillable = [
        'num',
        'date',
        'client',
        'utilisateurs_id',
    ];

    public function getNumeroInventaire(): string{
        return 'INVT'. str_pad(Inventaires::all()->count() + 1, 2, '0', STR_PAD_LEFT).'-'.date('Ymd');
    }

    public function utilisateurs(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function inventairesArticles()
    {
        return $this->HasMany(InventairesArticles::class);
    }
}