@extends('template')

@section('title')
  Participantes
@endsection

@section('css')

<style>
      #teste #first{
          margin-right: 2rem;
      }
  </style>
@endsection
@section('content')
    <div class="container d-flex h-100 justify-content-center align-items-center" style="min-height: 60vh">
        <div class="card col-9">
            <div class="card-header"><h3 style="text-align: center">Lista de Participantes</h3></div>
            <div class="card-body">
            <table class="table table-hover text-center">
            <thead class="thead-dark">
                <th colspan="2">Participantes</th>
                </thead>
            <tbody>
                @if(empty($evento->participante))
                    <div>Você não tem nenhum participante cadastrado nesse evento.</div>
                @endif

                @foreach($evento->participante as $participantes)
                    <tr>
                        <td>{{$participantes->nome}}</td>
                        <td><a class="btn btn-info" href='{{url("cracha/$participantes->id/$evento->id")}}'>Imprimir Cracha</a></td>
                    <tr>
                @endforeach    
                </tbody>
                <table>
        </div>
        <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Imprimir Lista</button>
                    </div>
    </div>

@endsection