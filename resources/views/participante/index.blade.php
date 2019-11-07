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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="participantes-tab" data-toggle="tab" href="#participantes" role="tab"          aria-controls="participantes" aria-selected="true">Ativos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="participantesInativos-tab" data-toggle="tab" href="#participantesInativos"    role="tab" aria-controls="participantesInativos" aria-selected="false">Inativos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="width:100%">
                <div class="tab-pane fade show active" id="participantes" role="tabpanel" aria-labelledby="participantes-tab">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Organização</th>
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
                        <nav class="d-flex justify-content-center" aria-label="Page navigation example">
                            {{ $participantes->appends(['ativos' => $participantes->currentPage(), 'inativos' => $participantesInativos->currentPage()])->links() }}
                            </nav>
                </div>
                <div class="tab-pane fade" id="participantesInativos" role="tabpanel" aria-labelledby="participantesInativos-tab">
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-borderless bg-white" style="border-style: solid; border-color: #dee2e6; border-width: 0 1px 1px 1px;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Organização</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($participantesInativos))
                                    <div>Você não tem nenhum participante excluído.</div>
                                @else
                                    @foreach($participantesInativos as $participante)
                                        <tr>
                                            <td>{{$participante->nome}}</td>
                                            <td>{{$participante->email}}</td>
                                            <td>{{$participante->telefone}}</td>
                                            <td>{{$participante->organizacao}}</td>
                                            <td><a class="btn btn-outline-success" href='{{url("participante/delete/$participante->id")}}'>Restaurar</a></td>
                                        <tr>
                                    @endforeach   
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <nav class="d-flex justify-content-center" aria-label="Page navigation example">
                        {{ $participantesInativos->appends(['ativos' => $participantes->currentPage(), 'inativos' => $participantesInativos->currentPage()])->links() }}
                            </nav>
                </div>
            </div>
        </div>
    </div>


@endsection