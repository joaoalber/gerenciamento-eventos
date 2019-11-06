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
        <div class="card">
            <div class="card-header text-center">Cadastro de Eventos</div>
                <div class="card-body">
                    <form method="POST" action="{{url($data['url'])}}">
                    @if($data['method'] == 'PUT')
                        @method('PUT')
                    @endif
                    @csrf
                        <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="">Nome</label>
                                    <input type="text" value="{{old('evento.nome', $data['evento'] ? $data['evento']->nome : '')}}" name="evento[nome]" class="form-control">
                                </div>

                            <div class="form-group col-md-3">
                                <label for="">Data do Evento</label>
                                <input type="date" value="{{old('evento.data', $data['evento'] ? $data['evento']->data : '')}}" name="evento[data]" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">Hora do Evento</label>
                                <input type="time" value="{{old('evento.hora', $data['evento'] ? $data['evento']->hora : '')}}" name="evento[hora]" class="form-control">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="">Descrição</label>
                                <input type="text" value="{{old('evento.descricao', $data['evento'] ? $data['evento']->descricao : '')}}" name="evento[descricao]" class="form-control">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="">Local:</label>
                                <input type="text" value="{{old('evento.local', $data['evento'] ? $data['evento']->local : '')}}" name="evento[local]" class="form-control">
                            </div>


                            <!-- todo o formulario -->
                        </div>
                   
                </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-success">Salvar</button>
                    </div>
                </form>
         </div>
    </div>
</div>
@endsection