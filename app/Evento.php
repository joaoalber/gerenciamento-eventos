<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{   
    use SoftDeletes;

    protected $table = 'evento';
    protected $fillable = ['nome','data','descricao','local','hora'];

    public function participante(){
        return $this->belongsToMany('App\Participante', 'participantes_eventos', 'evento_id', 'participante_id');
    }
    
}
