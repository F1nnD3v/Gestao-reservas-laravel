<?php

use App\Http\Controllers\GerirPessoasController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/GerirPessoas', [GerirPessoasController::class, 'GerirPessoas']);

Route::get('/', function () {
    return view('index');
});
