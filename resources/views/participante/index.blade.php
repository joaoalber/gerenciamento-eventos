@extends('template')
@section('title', 'Home')
@section('content')
    <div class="row d-flex justify-content-center mb-2">
        <h2 class="m-auto text-uppercase">Listagem de participantes</h2>
        <a class="btn btn-primary mr-3 align-self-center" href="{{url('participante/create')}}">Criar participante</a>
    </div>

    <table class="table table-hover text-center">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Organizacao</th>
            <th colspan="3">Ações</th>
        </thead>
        <tbody>
            @if(empty($participantes))
                <div>Você não tem nenhum participante cadastrado.</div>
            @else

            @foreach($participantes as $participante)
                <tr>
                    <td>{{$participante->nome}}</td>
                    <td>{{$participante->email}}</td>
                    <td>{{$participante->telefone}}</td>
                    <td>{{$participante->organizacao}}</td>
                    <td><a class="btn btn-primary" href='{{url("participante/show/$participante->id")}}'>Ficha</a></td>
                    <td><a class="btn btn-secondary" href='{{url("participante/edit/$participante->id")}}'>Atualizar</a></td>
                    <td><a class="btn btn-danger" href='{{url("participante/delete/$participante->id")}}'>Deletar</a></td>
                <tr>
            @endforeach    
        </tbody>
    <table>
    @endif
   
@endsection