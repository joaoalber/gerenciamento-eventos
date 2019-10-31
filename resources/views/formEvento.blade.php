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

    <div class="container d-flex h-100 justify-content-center align-items-center" style="min-height: 60vh">
        <div class="card col-9">
            <div class="card-header text-center">Cadastro de Eventos</div>
                <div class="card-body">
                    <form method="POST" action="{{url($data['url'])}}">
                    @if($data['method'] == 'PUT')
                        @method('PUT')
                    @endif
                    @csrf
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Nome</label>
                                    <input type="text"  value="{{old('evento.nome', $data['evento'] ? $data['evento']->nome : '')}}" name="evento[nome]" class="form-control">
                                </div>

                            <div class="form-group col-md-3">
                                <label for="">Data do Evento</label>
                                <input type="date" value="{{old('evento.data', $data['evento'] ? $data['evento']->data : '')}}" name="evento[data]" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Descrição</label>
                                <input type="text" value="{{old('evento.descricao', $data['evento'] ? $data['evento']->descricao : '')}}" name="evento[descricao]" class="form-control">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="">Local:</label>
                                <input type="text" value="{{old('evento.local', $data['evento'] ? $data['evento']->local : '')}}" name="evento[local]" class="form-control">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">Hora do Evento</label>
                                <input type="time" value="{{old('evento.hora', $data['evento'] ? $data['evento']->hora : '')}}" name="evento[hora]" class="form-control">
                            </div>
                            <!-- todo o formulario -->
                        </div>
                   
                </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
         </div>
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