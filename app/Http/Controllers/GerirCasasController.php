<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GerirCasasController extends Controller
{
    public function index()
    {
        return Casa::all();
    }

    public function adicionarCasa(Request $request){
        $casa = new Casa();
        $casa->id_dono = $request->id_dono;
        $casa->nome = $request->nome;
        $casa->morada = $request->morada;
        $casa->numero = $request->numero;
        $casa->codigoPostal = $request->codPostal;
        $casa->localidade = $request->localidade;
        $casa->distrito = $request->distrito;
        $casa->pais = $request->pais;
        $casa->save();
        return redirect('/GerirCasas')->with('success', 'Casa adicionada com sucesso!');
    }

    public function updateCasa(Request $request, $id){
        $id_dono = $request->input('id_dono');
        $nome = $request->input('nome');
        $morada = $request->input('morada');
        $numero = $request->input('numero');
        $codigoPostal = $request->input('codPostal');
        $localidade = $request->input('localidade');
        $distrito = $request->input('distrito');
        $pais = $request->input('pais');

        DB::update('update casas set id_dono = ?, nome = ?, morada = ?, numero = ?, codigoPostal = ?, localidade = ?, distrito = ?, pais = ? where id_casa = ?', [$id_dono, $nome, $morada, $numero, $codigoPostal, $localidade, $distrito, $pais, $id]);
        return redirect('/GerirCasas')->with('success', 'Casa atualizada com sucesso!');
    }

    public function deleteCasa($id){
        Casa::find($id)->delete();
        return redirect('/GerirCasas')->with('success', 'Casa removida com sucesso!');
    }
}
