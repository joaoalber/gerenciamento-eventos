@extends('template')
@section('title', 'Home')
@section('content')
    
<div class="card text-center position-static" style="margin:auto;width:110%;">
        <div class="card-header">
            <h3>Participantes</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-primary mr-3 align-self-center" href="{{url('participante/create')}}">Criar participante</a>
            </div>
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
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Organizacao</th>
                                    <th colspan="3">Ações</th>
                                </tr>
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
                                            <td><a class="btn btn-outline-info" href='{{url("participante/show/$participante->id")}}'>Ficha</a></td>
                                            <td><a class="btn btn-outline-secondary" href='{{url("participante/edit/$participante->id")}}'>Atualizar</a></td>
                                            <td><a class="btn btn-outline-danger" href='{{url("participante/delete/$participante->id")}}'>Deletar</a></td>
                                        <tr>
                                    @endforeach   
                                @endif
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