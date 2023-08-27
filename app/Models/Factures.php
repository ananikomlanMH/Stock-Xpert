<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factures extends Model {

    public $timestamps = false;

    protected $fillable = [
        'num',
        'date',
        'client',
        'utilisateurs_id',
    ];

    public function getNumeroFacture(): string{
        return 'FACT'. str_pad(Factures::all()->count() + 1, 2, '0', STR_PAD_LEFT).'-'.date('Ymd');
    }

    public function utilisateurs(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function facturesArticles()
    {
        return $this->HasMany(FacturesArticles::class);
    }

    public function total(): float|int
    {
        $total = 0;
        foreach(FacturesArticles::where('factures_id', $this->id)->get() as $item){
            $total += ($item->qte * $item->pv);
        }
        return $total;
    }
}