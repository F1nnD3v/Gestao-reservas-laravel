<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'email',
        'telefone',
        'nif',
        'id_tipo'
    ];

    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo', 'id_tipo');
    }

    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'id_cliente');
    }

    public function casas()
    {
        return $this->hasMany('App\Models\Casa', 'id_dono');
    }
}
