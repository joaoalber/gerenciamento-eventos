<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
        <h5 class="text-white h4">Teste BRAND</h5>
        <span class="text-muted">navbar</span>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    </div>
    <!-- <nav class="navbar fixed-top navbar-dark bg-dark ">
        <a class="navbar-brand text-center" style="height: 50px;" href="#">BRAND</a>
    </nav> -->
    <br>
    <div class="card text-center position-static" style="margin:auto;width:85%;">
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
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventos as $evento)
                                <tr id="teste"></td> 
                                    <td>{{ $evento->nome }}</td>
                                    <td>{{ $evento->data }}</td>
                                    <td>{{ $evento->hora }}</td>
                                    <td>{{ $evento->local }}</td>
                                    <td>{{ $evento->descricao }}</td>
                                    <td><div><a href="{{url('evento/presenca/'.$evento->id)}}" class="btn btn-primary">Go somewhere</a></div></td>
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
            <div class="text-right" ><a href="#" class="btn btn-primary">Go somewhere</a></div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <a class=" mx-auto navbar-brand" href="#">IFSP@2019</a>
    </nav>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>