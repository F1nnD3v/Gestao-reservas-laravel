@extends('welcome')

@section('title', 'Gestão de reservas')

@section('content')
    <div>
        <div style="margin: auto;">
            <a href="{{url('/GerirPessoas')}}"><button style="margin: auto">Gerir pessoas</button></a>
        </div>
        <div>
            <a><button>Gerir casas</button></a>
        </div>
        <div>
            <button>Gerir reservas</button>
        </div>
    </div>
@endsection
