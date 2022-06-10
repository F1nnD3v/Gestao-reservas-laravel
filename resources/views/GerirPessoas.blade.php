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
            <th scope="col">Telefone</th>
            <th scope="col">Morada</th>
            <th scope="col">NIF</th>
            <th scope="col">Tipo</th>
        </tr>
           <tr>
               {{$pessoas}}
{{--                @foreach($pessoas as $pessoa)
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->email}}</td>
                <td>{{$pessoa->telefone}}</td>
                <td>{{$pessoa->morada}}</td>
                <td>{{$pessoa->nif}}</td>
                <td>{{$pessoa->tipo}}</td>
                <td><a href="{{route('pessoas.edit', $pessoa->id)}}">Editar</a></td>
                <td><a href="{{route('pessoas.destroy', $pessoa->id)}}">Eliminar</a></td>
                @endforeach--}}
           </tr>
    </table>
   </div>
@endsection
