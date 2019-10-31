@extends('template')

@section('content')
    <div class="row">
        <h2 class="text-center">Listagem de participantes</h2>
        <a class="btn btn-primary text-end" href="{{url('participante/create')}}">Criar participante</a>
    </div>

    
    
    
    <table class="table table-hover text-center">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
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
                    <td><a href='{{url("participante/show/$participante->id")}}'>Ficha</a></td>
                    <td><a href='{{url("participante/edit/$participante->id")}}'>Atualizar</a></td>
                    <td><a href='{{url("participante/delete/$participante->id")}}'>Deletar</a></td>
                <tr>
            @endforeach    
        </tbody>
    <table>
    @endif
   
@endsection