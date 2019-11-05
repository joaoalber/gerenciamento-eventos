<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
        #menu li{
            display: inline;
        }

        #menu li a{
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        #menu li h5{
            padding: 14px 16px;
            display: block;
            text-align: center;
            margin-right: 3rem;
        }
    </style>
    @yield('css')
</head>
<body>
    <!-- <div class="pos-f-l">
        <div class="collapse navbar-collapse navbar-expand-lg" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menu">
                        <li class="nav-item">
                            <h5 class="text-white h4">Teste BRAND</h5>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="{{url('/')}}" tabindex="-1" aria-disabled="true">Início</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('evento')}}">Eventos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('participante')}}">Participantes</a>
                        </li>
                    </ul>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div> -->

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-flex align-items-center" href="#">
            <a href="{{url('/')}}" class="ml-2" style="text-decoration: none;color:#f2f2f2"><b><h3>Home</h3></b></a>
        </a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
            <!-- <ul class="navbar-nav mt-2 mt-lg-0 ml-auto"> -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('evento')}}">
                    <div class="row mr-1 ml-1">
                        <i class="material-icons mr-1">event</i>
                        Eventos
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('participante')}}">
                    <div class="row mr-1 ml-1">
                        <i class="material-icons mr-1">account_circle</i>
                        Participantes
                    </div>
                </a>
            </li>
        </div>
    </nav>

    <!-- <nav class="navbar fixed-top navbar-dark bg-dark ">
        <a class="navbar-brand text-center" style="height: 50px;" href="#">BRAND</a>
    </nav> -->
    <br>


    <div class="container">
        @yield('content')
    </div>

        <nav class="navbar fixed-bottom navbar-dark bg-dark">
            <a class=" mx-auto navbar-brand" href="#">IFSP@2019</a>
        </nav>

    <div class="row">
        @if (Session::has('success'))
            <script>
                window.onload = function() {
                    alertMsg('{{Session::get("success")}}', 'success')
                }
            </script>
        @endif

        @if (Session::has('warning'))
            <script>
                window.onload = function() {
                    alertMsg('{{Session::get("warning")}}', 'warning')
                }
            </script>
        @endif

        @if (Session::has('error'))
            <script>
                window.onload = function() {
                    alertMsg('{{Session::get("error")}}', 'error')
                }
            </script>
        @endif
    </div>

@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 5000
        });
        function alertMsg(msg, type) {
            Toast.fire({
                type: type,
                title: msg
            })
        }
    </script>
@yield('js')
@endsection

</body>
</html>