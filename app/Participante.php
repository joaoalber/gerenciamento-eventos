<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use SoftDeletes;

    protected $table = 'participante';

    protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao'];
    
    public function evento(){
        return $this->belongsToMany('App\Evento', 'participantes_eventos', 'participante_id', 'evento_id');
    }
}
