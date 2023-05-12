<?php
namespace App\Models;

use App\Helpers\NumberHelper\NumberHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model {

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'login',
        'password',
        'type',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => password_hash($value, PASSWORD_DEFAULT),
        );
    }
}