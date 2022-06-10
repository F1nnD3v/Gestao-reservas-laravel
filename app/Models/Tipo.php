<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];

    public function pessoas()
    {
        return $this->hasMany('App\Models\Pessoa', 'id_tipo');
    }

}
