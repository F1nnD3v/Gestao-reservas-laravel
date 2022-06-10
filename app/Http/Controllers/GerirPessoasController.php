<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GerirPessoasController extends Controller
{
    public function GerirPessoas()
    {
        return view('GerirPessoas');
    }
}
