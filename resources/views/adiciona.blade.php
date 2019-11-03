@extends('template')

@section('title')
  Eventos
@endsection

@section('css')
  <style>
      #teste #first{
          margin-right: 2rem;
      }
  </style>
@endsection

@section('content')
<form method="POST" action="{{url('/evento/salva')}}">
@csrf
        <input type="hidden" name="evento_id" value="{{$data['evento_id']}}">
        @foreach($participantes as $participante)
            <div>
               <input type="checkbox" name="participantes" value="{{$participante->id}}">
               <label for="scales">{{$participante->id}}</label>
            </div>

        @endforeach

        <input type="submit" value="salvar">
</form>
@endsection
