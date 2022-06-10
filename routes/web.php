<?php

use App\Http\Controllers\GerirPessoasController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/GerirPessoas', [GerirPessoasController::class, 'GerirPessoas']);
/*    $pessoas = Http::get('http://localhost:8000/api/pessoas/getPessoas')->json();
    return view('GerirPessoas', ['pessoas' => $pessoas]);
});*/

Route::get('/', function () {
    return view('index');
});
