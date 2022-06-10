<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'observacoes',
        'valor',
        'dataCheckIn',
        'dataCheckOut',
        'id_status',
        'id_casa',
	    'id_cliente',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    public function casa()
    {
        return $this->belongsTo('App\Models\Casa', 'id_casa');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }
}
