<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GerirPessoasController extends Controller
{
    public function GerirPessoas()
    {
        $pessoas = Http::get('http://localhost:8000/api/pessoas/getPessoas');
        echo '<script>alert("'.$pessoas.'")</script>';
            return view('GerirPessoas', ['pessoas' => $pessoas]);
    }
}
