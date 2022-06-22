@extends('welcome')

@section('title', 'Editar casa - '.$casa->nome)

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

        .btn-voltar{
            margin-left: .5rem;
            margin-top: 3rem;
        }
    </style>
    <div class="form">
        <a href="/GerirCasas" class="btn-voltar"><button class="btn btn-primary"><-</button></a>
        <form method="post" action="/updateCasa/{{$casa->id}}">
            <h1 style="color: black; margin-top: 1rem">Editar casa</h1>
            @csrf
            <label for="Nome">Nome</label>
            <input class="input" type="text" name="nome" placeholder="Nome" value="{{$casa->nome}}">
            <label for="morada">Morada</label>
            <input class="input" type="text" name="morada" placeholder="Morada" value="{{$casa->morada}}">
            <label for="numero">Número</label>
            <input class="input" type="text" name="numero" placeholder="Número" value="{{$casa->numero}}">
            <label for="codigoPostal">Cód. Postal</label>
            <input class="input" type="text" name="codigoPostal" placeholder="Cód. Postal" value="{{$casa->codigoPostal}}">
            <label for="localidade">Localidade</label>
            <input class="input" type="text" name="localidade" placeholder="Localidade" value="{{$casa->localidade}}">
            <label for="distrito">Dístrito</label>
            <input class="input" type="text" name="distrito" placeholder="Dístrito" value="{{$casa->distrito}}">
            <label for="pais">País</label>
            <input class="input" type="text" name="pais" placeholder="País" value="{{$casa->pais}}">
            <select name="id_dono">
                {{$donos = DB::table('pessoas')->get()->where('id_tipo', '=', '2')}}
            @foreach($donos as $dono)
                @if($dono->id == $casa->id_dono)
                    <option value="{{$dono->id}}" selected>{{$dono->nome}}</option>
                @else
                    <option value="{{$dono->id}}">{{$dono->nome}}</option>
                @endif
            @endforeach
            </select>
            <input type="submit" value="Guardar" name="submit" class="btn btn-success" style="margin-top: 1rem;">
        </form>
    </div>

@endsection
