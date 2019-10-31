<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Participante, Evento};

class CrachaController extends Controller
{
    public function index($id_p, $id_e){
        
        $participante = Participante::findOrFail($id_p);
        $evento = Evento::findOrFail($id_e);

        return view('cracha\cracha',compact('participante','evento'));
    }
}