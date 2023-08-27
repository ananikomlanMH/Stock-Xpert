<?php

namespace App\Models;

use App\Helpers\NumberHelper\NumberHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'articles_id',
        'qte_stock',
        'qte_alerte',
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class);
    }

    protected function qteStock(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => NumberHelper::removeSpaceToInt($value),
        );
    }

    protected function qteAlerte(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => NumberHelper::removeSpaceToInt($value),
        );
    }
}