<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    use HasFactory;

    protected $table = 'dominios';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre_dominio',
        'url',
        'data_registro',
        'data_alta',
        'data_baja',
        'actiu',
    ];

    protected $casts = [
        'nombre_dominio' => 'string',
        'data_registro' => 'datetime',
        'data_alta' => 'datetime',
        'data_baja' => 'datetime',
        'actiu' => 'boolean',
    ];
}
