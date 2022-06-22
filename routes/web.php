<?php

use App\Http\Controllers\GerirCasasController;
use App\Http\Controllers\GerirPessoasController;
use App\Models\Casa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Pessoa;

//pessoas
Route::post('addPessoa', [GerirPessoasController::class, 'adicionarPessoa'])->name('addPessoa');

Route::post('/update/{id}',[GerirPessoasController::class, 'updatePessoa'])->name('updatePessoa');

Route::post('/delete/{id}',[GerirPessoasController::class, 'deletePessoa'])->name('deletePessoa');

Route::post('addCasa', [GerirCasasController::class, 'adicionarCasa'])->name('addCasa');

Route::post('/updateCasa/{id}',[GerirCasasController::class, 'updateCasa'])->name('updateCasa');

Route::post('/deleteCasa/{id}',[GerirCasasController::class, 'deleteCasa'])->name('deleteCasa');

Route::post('addReserva', [GerirCasasController::class, 'adicionarCasa'])->name('addCasa');

Route::post('/updateReserva/{id}',[GerirCasasController::class, 'updateCasa'])->name('updateCasa');

Route::post('/deleteReserva/{id}',[GerirCasasController::class, 'deleteCasa'])->name('deleteCasa');

Route::get('/GerirPessoas', function () {
    $pessoas = Pessoa::all();
    return view('GerirPessoas', ['pessoas' => $pessoas]);
});

Route::get('/AdicionarPessoa', function (){
    return view('AdicionarPessoa');
});

Route::get('/EditarPessoa/{id}', function ($id){
    $pessoa = Pessoa::find($id);
    return view('EditarPessoa', ['pessoa' => $pessoa]);
});

//Casas

Route::get('GerirCasas', function () {
    $casas = Casa::all();
    return view('GerirCasas', ['casas' => $casas]);
});

Route::get('/AdicionarCasa', function (){
    return view('AdicionarCasa');
});

Route::get('/EditarCasa/{id}', function ($id_casa){
    $casa = Casa::find($id_casa);
    return view('EditarCasa', ['casa' => $casa]);
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();
