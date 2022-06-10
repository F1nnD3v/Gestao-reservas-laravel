<?php

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// ------------------Pessoas api requests------------------
//Get all pessoas from database
Route::get('/pessoas/getPessoas', function () {
    return Pessoa::all();
});

//Get a pessoa from database
Route::get('/pessoas/getPessoa/{id}', function ($id) {
    return Pessoa::find($id);
});

//Add new pessoa to database
Route::post('/pessoas/addPessoa', function () {
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
