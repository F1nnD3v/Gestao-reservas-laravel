<?php

use App\Http\Controllers;
use App\Http\Controllers\GerirCasasController;
use App\Http\Controllers\GerirPessoasController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

use App\Models\Pessoa;
use Illuminate\Http\Request;


// ------------------Pessoas api requests------------------

Route::GET('/pessoas', [GerirPessoasController::class, 'index']);
Route::get('/casas', [GerirCasasController::class, 'index']);




//Get a pessoa from database
Route::get('/pessoas/getPessoa/{id}', function ($id) {
    return Pessoa::find($id);
});

//Add new pessoa to database
Route::post('/pessoas/addPessoa', function () {
    if(Str::length(request('nome')) <= 0 && Str::length(request('idade')) <= 0 && Str::length(request('email')) <= 0 && Str::length(request('telefone')) <= 0 && Str::length(request('nif')) <= 0 && Str::length(request('tipo')) <= 0){
        return response()->json(['error' => 'Preencha todos os campos!'], 400);
    }

    if([GerirPessoasController::class, 'adicionarPessoa']){
        return response()->json(['error' => 'NIF invalido'], 400);
    }
    return Pessoa::create([
       'nome' => request('nome'),
       'idade' => request('idade'),
       'email' => request('email'),
       'telefone' => request('telefone'),
        'nif' => request('nif'),
        'id_tipo' => request('id_tipo')
    ]);
});

//Update a pessoa in database
Route::put('/pessoas/updatePessoa/{pessoa}', function (Pessoa $pessoa) {
    if(Str::length(request('nome')) <= 0 && Str::length(request('idade')) <= 0 && Str::length(request('email')) <= 0 && Str::length(request('telefone')) <= 0 && Str::length(request('nif')) <= 0 && Str::length(request('tipo')) <= 0){
        return response()->json(['error' => 'Preencha todos os campos!']);
    }

    if(!validateNIF(request('nif'))) {
        return response()->json(['error' => 'NIF invalido'], 400);
    }

    $pessoa->update([
        'nome' => request('nome'),
        'idade' => request('idade'),
        'email' => request('email'),
        'telefone' => request('telefone'),
        'nif' => request('nif'),
        'id_tipo' => request('id_tipo')
     ]);
     return $pessoa;
});

//delete a pessoa from database
Route::delete('/pessoas/deletePessoa/{pessoa}', function (Pessoa $pessoa) {
    $pessoa->delete();
    return $pessoa;
});


//casas
