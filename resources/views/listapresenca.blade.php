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
            <div class="card-header text-center">Participantes</div>
                <div class="card-body">

                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    @foreach($evento->participante as $participantes)
                                        {{$participantes->nome}}
                                    @endforeach
                                </div>       
                        </div>

                    
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Imprimir</button>
                    </div>
    </div>

@endsection