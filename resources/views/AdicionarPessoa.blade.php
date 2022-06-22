@extends('welcome')

@section('title', 'Adicionar pessoa')

@section('content')
    <form method="post" action="{{url('addPessoa')}}">
        @csrf
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="idade" placeholder="Idade">
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="text" name="nif" placeholder="NIF">
        <select name="tipo">
            {{$tipos = DB::table('tipos')->get()}}
            @if($tipos->count() > 0)
                <option value="">Selecione um tipo</option>
        @foreach($tipos as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
            @endforeach
            @else
                <option value="">Não existem tipos</option>
            @endif
        </select>
        <input type="submit" value="Adicionar" name="submit" class="btn btn-primary">
    </form>
@endsection
