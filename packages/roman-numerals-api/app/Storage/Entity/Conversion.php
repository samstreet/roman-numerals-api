<?php

namespace App\Storage\Entity;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'integer',
        'numeral',
        'converted_at',
    ];

    protected $casts = [
        'converted_at' => 'datetime'
    ];
}
