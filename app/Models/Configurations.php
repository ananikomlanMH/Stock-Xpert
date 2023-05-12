<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configurations extends Model {

    public $timestamps = false;

    protected $fillable = [
        'margin_top',
        'margin_bottom',
        'header',
        'footer',
    ];
}