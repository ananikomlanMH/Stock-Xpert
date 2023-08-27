<?php
namespace App\Models;

use App\Helpers\NumberHelper\NumberHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Depenses extends Model {

    public $timestamps = false;

    protected $fillable = [
        'motif',
        'date',
        'montant',
    ];

    protected function montant(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => NumberHelper::removeSpaceToInt($value),
        );
    }
}