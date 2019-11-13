@extends('template')
@section('title', 'Cadastro de participante')
@section('content')

    

        <form id="form" method="POST" action="{{url(isset($participante) ? 'participante/update/'.$participante->id : 'participante/store')}}">
        {{csrf_field()}}

    

                <div class="container d-flex h-100 justify-content-center align-items-center row" style="min-height: 60vh">
                
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if (session()->has('success'))
    
                    <div class="alert alert-success">
                        {{session()->get("success")}}
                    </div>
                @endif
                <div class="card col-11">

                <div class="card-header text-center">Cadastro de Participantes</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">person</i></span>
                            </div>  
                            <input required type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="{{old('nome', isset($participante) ? $participante->nome : '')}}">       
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">perm_identity</i></span>
                            </div>
                            <input required type="text" id="rg" name="rg"  maxlength="12" class="form-control" placeholder="RG" value="{{old('rg', isset($participante) ? $participante->rg : '')}}">
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">picture_in_picture</i></span>
                            </div>
                            <input required type="text" id="cpf" name="cpf"  maxlength="14" class="form-control" placeholder="CPF" value="{{old('cpf', isset($participante) ? $participante->cpf : '')}}">
                            {{$errors->first('cpf')}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">email</i></span>
                            </div>
                            <input required type="email" id="email" name="email" class="form-control" placeholder="fulano@gmail.com (email)" value="{{old('email', isset($participante) ? $participante->email : '')}}">
                            {{$errors->first('email')}}
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">phone</i></span>
                            </div>
                            <input  required type="text" id="telefone" name="telefone"  class="form-control" placeholder="Telefone" value="{{old('telefone', isset($participante) ? $participante->telefone : '')}}">
                            {{$errors->first('telefone')}}
                        </div>

                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
                            </div>
                            <input required type="date" max="9999-12-31" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de nascimento" value="{{old('data_nascimento', isset($participante) ? $participante->data_nascimento : '')}}">
                            
                        </div>

                        <div class="input-group col mt-3 mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="material-icons">business</i></span>
                                </div>
                                <input required type="text" id="organizacao" name="organizacao" class="form-control" placeholder="Organização" value="{{old('organizacao', isset($participante) ? $participante->organizacao : '')}}">
                        </div>

                        <div class="input-group col mt-3 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons">event</i></span>
                            </div>
                            <select class="form-control" name="eventos">
                                <option value="">Escolha o evento</option>
                                @foreach($eventos as $evento)
                                    <option value="{{$evento->id}}">{{$evento->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                    

                    </div>
                </div>
                
                <div class="card-footer text-right">
                    <a class="btn btn-outline-primary " href="{{url('participante')}}">Voltar</a>
                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                </div>
            </div>
            </div>
            

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
            <script type="text/javascript" src="js/validate-form.js"></script>
            <script>
            
                  $(document).ready(function () {
                      
                    

                    jQuery.validator.addMethod("verificaespaco", function(value, element) {
    return value.indexOf(" ") == -1 ;
  }, "<span style='color:red'>Não pode conter espaços</span>");


  jQuery.validator.addMethod("dataBR", function (value, element) {
    //contando chars
    if (value.length != 10) return (this.optional(element) || false);
    // verificando data
    var data = new Date();
    var anoAtual = data.getYear();
    var mesAtual = data.getMonth() + 1;
    var diaAtual = data.getDate();
    if (anoAtual < 1000){
      anoAtual+=1900;
    }
  
    var data = value;
    var dia = data.substr(0, 2);
    var barra1 = data.substr(2, 1);
    var mes = data.substr(3, 2);
    var barra2 = data.substr(5, 1);
    var ano = data.substr(6, 4);
    if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
    if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
    if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
    if (ano < 1900 || ano > anoAtual) return (this.optional(element) || false);
    if (ano < anoAtual) return (this.optional(element) || false);
    if (ano >= anoAtual && mes > mesAtual) return (this.optional(element) || false);
    if ((ano >= anoAtual && dia > diaAtual) && (mes >= mesAtual && dia > diaAtual)) return (this.optional(element) || false);
  
    return (this.optional(element) || true);
  }, "Informe uma data válida.");  // Mensagem padrão

jQuery.validator.addMethod("cpf", function(value, element) {
    value = jQuery.trim(value);
 
     value = value.replace('.','');
     value = value.replace('.','');
     cpf = value.replace('-','');
     while(cpf.length < 11) cpf = "0"+ cpf;
     var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
     var a = [];
     var b = new Number;
     var c = 11;
     for (i=0; i<11; i++){
         a[i] = cpf.charAt(i);
         if (i < 9) b += (a[i] * --c);
     }
     if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
     b = 0;
     c = 11;
     for (y=0; y<10; y++) b += (a[y] * c--);
     if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
 
     var retorno = true;
     if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;
 
     return this.optional(element) || retorno;
 
 }, "<span style='color:red'>Informe um CPF válido</span>");

    $("#form").validate({
        rules:{
            cpf:{
                required:true,
                cpf: true
            },
            email:{
                required:true,
                email:true,
            },
            data_nascimento:{
                required:true,
            },
            nome:{
                required:true,
            },
            rg:{
                required:true,
            },
            telefone:{
                required:true,
            },
            organizacao:{
                required:true,
            },
            eventos:{
                required:true,
            },
        },
        messages:{
            cpf:{
                required:"<span style='color:red'>Preencha o campo CPF</span>",
            },
            email:{
                required:"<span style='color:red'>Preencha o campo Email</span>",
                email:"<span style='color:red'>Insira um email válido (exemplo@exemplo.com)</span>",
            },
            data_nascimento:{
                required:"<span style='color:red'>Preencha o campo data de Nascimento</span>",
            },
            rg:{
                required:"<span style='color:red'>Preencha o campo RG</span>",
            },
            telefone:{
                required:"<span style='color:red'>Preencha o campo telefone</span>",
            },
            nome:{
                required:"<span style='color:red'>Preencha o campo nome</span>",
            },
            organizacao:{
                required:"<span style='color:red'>Preencha o campo organização</span>",
            },
            eventos:{
                required:"<span style='color:red'>Preencha o campo eventos</span>",
            },
        }
    });



                    var cpf = $("#cpf");
                    cpf.mask('000.000.000-00', {reverse: true});

                    $("#telefone").mask(behavior);
                    
                    var rg = $("#rg");
                    rg.mask('00.000.000-0');

                 });

                 var behavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 00000-0009';
                },

                options = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };
            </script>
        </form>
@endsection


