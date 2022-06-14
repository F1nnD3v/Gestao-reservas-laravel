<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Pessoa;


Route::get('/GerirPessoas', function () {
    $pessoas = Pessoa::all();
    return view('GerirPessoas', ['pessoas' => $pessoas]);
});

Route::get('/EditarPessoa', function ($id){
    $pessoa = Pessoa::find($id);
    return view('EditarPessoa', ['pessoa' => $pessoa]);
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
