<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Log;

class GerirPessoasController extends Controller
{
    public function index()
    {
        return Pessoa::all();
    }

    public function adicionarPessoa(Request $request){
        if(!$this->validateNIF($request->nif)){
            return redirect('/GerirPessoas')->with('error', 'NIF inválido!');
        }
        $pessoa = new Pessoa();
        $pessoa->nome = $request->nome;
        $pessoa->idade = $request->idade;
        $pessoa->email = $request->email;
        $pessoa->telefone = $request->telefone;
        $pessoa->nif = $request->nif;
        $pessoa->id_tipo = $request->tipo;
        $pessoa->save();
        return redirect('/GerirPessoas')->with('success', 'Pessoa adicionada com sucesso!');
    }

    public function updatePessoa(Request $request, $id){
        if (!$this->validateNIF($request->nif)) {
            return redirect('/GerirPessoas')->with('error', 'NIF invalido');

        }
        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $email = $request->input('email');
        $telefone = $request->input('telefone');
        $nif = $request->input('nif');
        $tipo = $request->input('tipo');

        DB::update('update pessoas set nome = ?, idade = ?, email = ?, telefone = ?, nif = ?, id_tipo = ? where id = ?', [$nome, $idade, $email, $telefone, $nif, $tipo, $id]);
        return redirect('/GerirPessoas')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function deletePessoa($id){
        Pessoa::find($id)->delete();
        return redirect('/GerirPessoas')->with('success', 'Pessoa removida com sucesso!');
    }

    public function validateNIF($nif) {
        $nif = trim($nif);
        $nif_split = str_split($nif);
        $primeirosNumeros = array(1, 2, 3, 5, 6, 7, 8, 9);
        if (is_numeric($nif) && strlen($nif) == 9 && in_array($nif_split[0], $primeirosNumeros)) {
            $check_digit = 0;
            for ($i = 0; $i < 8; $i++) {
                $check_digit += $nif_split[$i] * (10 - $i - 1);
            }
            $check_digit = 11 - ($check_digit % 11);
            $check_digit = $check_digit >= 10 ? 0 : $check_digit;
            if ($check_digit == $nif_split[8]) {
                return true;
            }
        }
        return false;
    }
}
