<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{   protected $table = 'evento';
    protected $fillable = ['nome','data','descricao','local','hora'];

    public function participante(){
        return $this->belongsToMany('App\Participante', 'participantes_eventos', 'evento_id', 'participante_id');
    }
    
}
