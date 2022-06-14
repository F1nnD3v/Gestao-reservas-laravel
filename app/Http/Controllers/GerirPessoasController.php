<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pessoa;

class GerirPessoasController extends Controller
{
    public function index()
    {
        return Pessoa::all();
    }
}
