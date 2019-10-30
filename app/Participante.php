<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    protected $table = 'participante';

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao'];

    use SoftDeletes;
    
    public function evento(){
        return $this->belongsToMany('App\Evento', 'participantes_eventos', 'participante_id', 'evento_id');
    }
}
