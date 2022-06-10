<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'stat'
    ];

    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'id_stat');
    }
}
