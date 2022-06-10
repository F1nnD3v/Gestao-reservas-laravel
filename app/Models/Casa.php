<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dono',
        'nome',
        'morada',
        'numero',
        'codigoPostal',
        'localidade',
        'distrito',
        'pais'
    ];

    public function dono()
    {
        return $this->belongsTo('App\Models\Pessoa', 'id_dono');
    }

    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'id_casa');
    }
}
