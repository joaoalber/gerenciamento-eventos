<?php

namespace App\Http\Controllers;

use App\{Evento, Participante};
use DB;

class ParticipantesEventosController extends Controller
{

public function listaPresenca() {
        $participantesEventos = participantes_eventos::all();
        return view('listapresenca', compact('eventos'));
    }

}