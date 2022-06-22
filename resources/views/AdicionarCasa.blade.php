@extends('welcome')

@section('title', 'Adicionar casa')

@section('content')
    <form method="post" action="{{url('addCasa')}}">
        @csrf
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="morada" placeholder="Morada">
        <input type="text" name="numero" placeholder="Número">
        <input type="text" name="codPostal" placeholder="Cód. Postal">
        <input type="text" name="localidade" placeholder="Localidade">
        <input type="text" name="distrito" placeholder="Distrito">
        <input type="text" name="pais" placeholder="País">
        <select name="id_dono">
            {{$donos = DB::table('pessoas')->get()->where('id_tipo', '=', '2')}}
            @if($donos->count() > 0)
                <option value="">Selecione um dono</option>
            @foreach($donos as $dono)
                <option value="{{$dono->id}}">{{$dono->nome}}</option>
            @endforeach
            @else
                <option value="">Não existem donos</option>
            @endif
        </select>
        <input type="submit" value="Adicionar" name="submit" class="btn btn-primary">
    </form>
@endsection
