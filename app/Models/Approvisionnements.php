<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approvisionnements extends Model {

    public $timestamps = false;

    protected $fillable = [
        'num',
        'date',
        'fournisseur',
        'utilisateurs_id',
    ];

    public function getNumero(): string{
        return 'APO'. str_pad(Approvisionnements::all()->count() + 1, 2, '0', STR_PAD_LEFT).'-'.date('Ymd');
    }

    public function utilisateurs(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateurs::class);
    }

    public function approvissionnmentArticles()
    {
        return $this->HasMany(ApprovisionnmentsArticles::class);
    }

    public function total(): float|int
    {
        $total = 0;
        foreach(ApprovisionnmentsArticles::where('approvisionnements_id', $this->id)->get() as $item){
            $total += ($item->qte * $item->pa);
        }
        return $total;
    }
}