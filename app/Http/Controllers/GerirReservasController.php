<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;


class GerirReservasController extends Controller
{
    public function index()
    {
        return Reserva::all();
    }

    public function adicionarReserva(Request $request){
        $reserva = new Reserva();
        $reserva->observacoes = $request->observacoes;
        $reserva->valor = $request->valor;
        $reserva->dataCheckIn = $request->dataCheckIn;
        $reserva->dataCheckOut = $request->dataCheckOut;
        $reserva->id_status = $request->id_status;
        $reserva->id_casa = $request->id_casa;
        $reserva->id_cliente = $request->id_cliente;
        $reserva->save();
        return redirect('/GerirReservas')->with('success', 'Reserva adicionada com sucesso');
    }

    public function updateReserva(Request $request, $id){
        $observacoes = $request->input('observacoes');
        $valor = $request->input('valor');
        $dataCheckIn = $request->input('dataCheckIn');
        $dataCheckOut = $request->input('dataCheckOut');
        $id_status = $request->input('id_status');
        $id_casa = $request->input('id_casa');
        $id_cliente = $request->input('id_cliente');

        DB::update('update reservas set observacoes = {$observacoes}, valor = {$valor}, dataCheckIn = {$dataCheckIn}, dataCheckOut = {$dataCheckOut}, id_status = {$id_status}, id_casa = {$id_casa}, id_cliente = {$id_cliente} where id_reserva = {$id}');
        return redirect('/GerirReservas')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function deleteReserva($id){
        Reserva::find($id)->delete();
        return redirect('/GerirReservas')->with('success', 'Reserva removida com sucesso!');
    }
}
