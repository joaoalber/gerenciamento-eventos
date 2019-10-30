<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = ['participante'];

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao'];

    public function evento(){
        return $this->belongsToMany('App\Entities\Evento', 'participantes_eventos', 'participante_id', 'evento_id');
    }
}
