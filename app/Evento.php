<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{   protected $table = 'evento';
    protected $fillable = ['nome','data','descricao','local','hora'];
    use SoftDeletes;
    public function participante(){
        return $this->belongsToMany('App\Participante', 'participantes_eventos', 'evento_id', 'participante_id');
    }
    
}
