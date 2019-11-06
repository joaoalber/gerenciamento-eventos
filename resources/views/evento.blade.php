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



    <div class="card text-center position-static" style="margin:auto;width:110%;">
        <div class="card-header">
            <h3>Eventos</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-primary mr-3 align-self-center" href="{{url('evento/create')}}">Criar evento</a>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" aria-selected="true">Ativos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="eventosInativos-tab" data-toggle="tab" href="#eventosInativos" role="tab" aria-controls="eventosInativos" aria-selected="false">Inativos</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
        
    <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
        <thead>
            <tr> 
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Local</th>
                <th scope="col">Descrição</th>
                <th scope="col">Participantes</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
            <tr id="eventos">
                <td>{{ $evento->nome }}</td>
                <td>{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                <td>{{ $evento->local }}</td>
                <td>{{ $evento->descricao }}</td>
                <td><div class="justify-content-center"><a href="{{url('evento/presenca/'.$evento->id)}}" id="first" class="btn btn-outline-primary">Listar</a><a href="{{'evento/adicionaparticipante/'.$evento->id}}" class="btn btn-outline-success">Adicionar</a></div></td>

                <td><a href="{{url('evento/'.$evento->id.'/edit')}}" class="btn btn-outline-warning ">Editar</a></td>
                <td>
                    <form action="{{url('evento', [$evento->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav class="d-flex justify-content-center" aria-label="Page navigation example">
    {{ $eventos->links() }}
            </nav>
  </div>
  <div class="tab-pane fade" id="eventosInativos" role="tabpanel" aria-labelledby="eventosInativos-tab">
  <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
        <thead>
            <tr> 
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Local</th>
                <th scope="col">Descrição</th>
                <th colspan="1">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventosInativos as $evento)
            <tr id="eventos">
                <td>{{ $evento->nome }}</td>
                <td>{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                <td>{{ $evento->local }}</td>
                <td>{{ $evento->descricao }}</td>
                <td><form action="{{url('evento', [$evento->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-success">Restaurar</button>
                    </form></td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    <nav class="d-flex justify-content-center" aria-label="Page navigation example">
    {{ $eventosInativos->links() }}
            </nav>
    
    </div>
</div>
            
        </div>
    </div>
@endsection