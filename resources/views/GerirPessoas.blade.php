@extends('welcome')

@section('title', 'Gerir pessoas')

@section('content')
   <div class="form">
       <ul class="nav nav-tabs">
           <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#">Gerir pessoas</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="#">Gerir casas</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="#">Gerir reservas</a>
           </li>
       </ul>
       <table class="table">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Idade</th>
            <th scope="col">Telefone</th>
            <th scope="col">NIF</th>
            <th scope="col">Tipo</th>
        </tr>
                @foreach($pessoas as $pessoa)
               <tr>
               <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->email}}</td>
               <td>{{$pessoa->idade}}</td>
                <td>{{$pessoa->telefone}}</td>
                <td>{{$pessoa->nif}}</td>
                <td>{{$pessoa->tipo['tipo']}}</td>
                <td>
                    <a href="{{url('/EditarPessoa', $pessoa->id)}}">
                        <button>
                            <span class="oi oi-pencil" data-glyph="pencil"></span>
                        </button>
                    </a>
                </td>
                <td><a>Eliminar</a></td>
           </tr>
                @endforeach
    </table>
   </div>
@endsection
