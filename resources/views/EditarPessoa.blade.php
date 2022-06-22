@extends('welcome')

@section('title', 'Editar pessoa - '.$pessoa->nome)

@section('content')
    <style>
        .input{
            margin: auto;
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0px;
            border-bottom: 1px solid #5471ff;
            outline: none;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            width: auto;
            height: auto;
            color: black;
        }
    </style>
    <a href="/GerirPessoas"><button class="btn btn-primary">Voltar</button></a>
    <div class="form">
        <form method="post" action="/update/{{$pessoa->id}}">
            <h1 style="color: black; margin-top: 1rem">Editar pessoa</h1>
            @csrf
            <label for="nome">Nome</label>
            <input class="input" type="text" name="nome" placeholder="Nome" value="{{$pessoa->nome}}">
            <label for="email">Email</label>
            <input class="input" type="text" name="email" placeholder="Email" value="{{$pessoa->email}}">
            <label for="idade">Idade</label>
            <input class="input" type="text" name="idade" placeholder="Idade" value="{{$pessoa->idade}}">
            <label for="telefone">Telefone</label>
            <input class="input" type="text" name="telefone" placeholder="Telefone" value="{{$pessoa->telefone}}">
            <label for="nif">NIF</label>
            <input class="input" type="text" name="nif" placeholder="NIF" value="{{$pessoa->nif}}">
            <label for="tipo">Tipo</label>
            <select name="tipo">
                {{$tipos = DB::table('tipos')->get()}}
            @foreach($tipos as $tipo)
                @if($tipo->id == $pessoa->id_tipo)
                    <option value="{{$tipo->id}}" selected>{{$tipo->tipo}}</option>
                @else
                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                @endif
                @endforeach
            </select>
            <input type="submit" value="Guardar" name="submit" class="btn btn-success" style="margin-top: 1rem;">
        </form>
    </div>

@endsection
