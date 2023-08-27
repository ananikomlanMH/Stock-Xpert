<?php

namespace App\Models;

use App\Helpers\NumberHelper\NumberHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'libelle',
        'categories_id',
        'pv',
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    protected function pv(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => NumberHelper::removeSpaceToInt($value),
        );
    }

}