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

<div class="card" style="width: 40rem;">
  <div class="card-header text-center">Gerenciar Participante</div>
  <div style="overflow-y:auto;">
  <div class="card-body w-100">
      <form method="POST" action="{{url('/evento/salva')}}">
        @csrf

        <input type="hidden" name="evento_id" value="{{$data['evento_id']}}">

              <?php $i = 0; ?>
              <!-- (Flávio) Checkbox agora vem com os participantes que pertencem a esse evento checkados. participantes[] agora tem um index diferente para cada opção (participantes[0], participantes[1], etc..). -->
              @foreach($participantes as $participante)
              <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="customCheck<?php echo $i ?>" type="checkbox" name="participantes[<?php echo $i ?>]" value="{{$participante->id}}" 
                    <?php 
                          if(isset($evento_participante)){
                            foreach ($evento_participante as $key) {
                              if($key->pivot->participante_id == $participante->id){
                                echo 'checked';
                              }
                            }
                          }
                      ?>>
                    <label class="custom-control-label" for="customCheck<?php echo $i ?>">{{$participante->nome}}</label>
              </div>
              <?php $i++; ?>
              @endforeach

      
    </div>
    </div>
    <div class="card-footer d-flex justify-content-end"> 
                <input type="submit" value="Salvar" class="btn btn-primary">
              </div>
    </form>
    </div>
@endsection
