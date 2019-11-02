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
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-teste-tab" data-toggle="tab" href="#nav-teste" role="tab" aria-controls="nav-teste" aria-selected="false">Ativos</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent" style="width:100%">
                <div class="tab-pane fade show active" id="nav-teste" role="tabpanel" aria-labelledby="nav-teste-tab">
                    <div>
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
                                <tr id="teste"></td> 
                                    <td>{{ $evento->nome }}</td>
                                    <td>{{\Carbon\Carbon::parse($evento->data)->format('d/m/Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($evento->hora)->format('h:i')}}</td>
                                    <td>{{ $evento->local }}</td>
                                    <td>{{ $evento->descricao }}</td>
                                    <td><div class="justify-content-center"><a href="{{url('evento/presenca/'.$evento->id)}}" id="first" class="btn btn-primary">Listar</a><a href="#" class="btn btn-success">Adicionar</a></div></td>

                                    <td><a href="{{url('evento/'.$evento->id.'/edit')}}" class="btn btn-warning ">Editar</a></td>
                                    <td>
                                        <form action="{{url('evento', [$evento->id])}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav class="d-flex justify-content-center" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection