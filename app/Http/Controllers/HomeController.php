<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Evento, Participante};

class HomeController extends Controller
{
    public function index() {
        $data = [
            'evento' => Evento::count(),
            'participante' => Participante::count(),
        ];
        return view('home', compact('data'));
    }
}
