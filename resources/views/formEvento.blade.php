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
    <div class="container d-flex h-100 justify-content-center align-items-center" style="min-height: 60vh">
        <div class="card col-11">
            <div class="card-header text-center">Cadastro de Eventos</div>
                <div class="card-body">
                    <form method="POST" action="{{url($data['url'])}}">
                    @if($data['method'] == 'PUT')
                        @method('PUT')
                    @endif
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">subtitles</i></span>
                                    </div>      
                                    <input required type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="{{old('evento.nome', $data['evento'] ? $data['evento']->nome : '')}}" name="evento[nome]">
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
                                    </div>
                                <input required type="date" id="data" name="data" class="form-control" placeholder="Data" value="{{old('evento.data', $data['evento'] ? $data['evento']->data : '')}}" name="evento[data]">
                           </div>
                           </div>

                            <div class="form-group col-md-2">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                    </div>
                                <input required type="time" id="hora" name="hora" value="{{old('evento.hora', $data['evento'] ? $data['evento']->hora : '')}}" name="evento[hora]" class="form-control">
                            </div>
                            </div>

                            <div class="form-group col-md-5">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">description</i></span>
                                    </div>
                                <input required type="text" id="descricao" name="descricao" placeholder="Descrição" value="{{old('evento.descricao', $data['evento'] ? $data['evento']->descricao : '')}}" name="evento[descricao]" class="form-control">
                            </div>
                            </div>

                            <div class="form-group col-md-5">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="material-icons">deck</i></span>
                                    </div>
                                <input required type="text" id="local" name="local" placeholder="Local" value="{{old('evento.local', $data['evento'] ? $data['evento']->local : '')}}" name="evento[local]" class="form-control">
                            </div>
                            </div>


                            <!-- todo o formulario -->
                        </div>
                   
                </div>
                    <div class="card-footer d-flex justify-content-end">
                    <a class="btn btn-outline-primary " href="{{url('evento')}}">Voltar</a>
                        <button type="submit" class="btn btn-outline-success ml-2">Salvar</button>
                    </div>
                </form>
         </div>
    </div>
</div>
@endsection