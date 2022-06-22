@extends('welcome')

@section('title', 'Editar casa - ' . $casa->nome)


@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>
    <a href="{{url('/AdicionarPessoa')}}" class="justify-content-end" style="margin-left: 78.6rem">
        <button class="btn btn-primary justify-content-end">Adicionar pessoa</button>
    </a>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #5C9EAD;
            color: #EEEEEE;
        }

        .form{
            margin: auto;
            width: 50%;
            min-width: 670px;
            background-color: white;
            border-radius: .5rem;
            margin-top: 1rem;
            color:black;
        }

        .navbar{
            background-color: #326273;
            width: 100%;
        }
    </style>
    @if (Session::has('error'))
        <div class="alert alert-info">{{ Session::get('error') }}</div>
    @endif
    <div class="form">
        <form action="/updateCasa/{{$casa->id_casa}}" method="post">
            @csrf
        <label for="id_dono">Proprietário</label>
        <select name="id_dono">
            {{$proprietarios = DB::table('pessoas')->where('id_tipo', '=', '2')->get()}}
        @foreach($proprietarios as $proprietario)
            <option value="{{$proprietario->id}}">{{$proprietario->nome}}</option>
        @endforeach
        </select>
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="{{$casa->nome}}">
        <label for="morada">Morada</label>
        <input type="text" name="morada" value="{{$casa->morada}}">
        <label for="morada">Morada</label>
        <input type="text" name="numero" value="{{$casa->numero}}">
        <label for="codigo_postal">Código postal</label>
        <input type="text" name="codigoPostal" value="{{$casa->codigoPostal}}">
        <label for="localidade">Localidade</label>
        <input type="text" name="localidade" value="{{$casa->localidade}}">
        <label for="distrito">Distrito</label>
        <input type="text" name="distrito" value="{{$casa->distrito}}">
        <label for="pais">País</label>
        <input type="text" name="pais" value="{{$casa->pais}}">
        <input type="submit" value="Editar">
        </form>
    </div>
@endsection
