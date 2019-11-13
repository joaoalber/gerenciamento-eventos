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

    public function buscaIndex(){
        return view('cracha\buscarParticipante');
    }
    
    public function buscar(Request $request){
        try{
            $participante = Participante::where('cpf', $request->cpf)->get();
            // return $participante;
            if(isset($participante)){
                return view('cracha\buscarParticipante', compact('participante'))->with('success', 'Participante Encontrado!');
            }else{
                return view('cracha\buscarParticipante')->with('error', 'Participante Não Encontrado!');
            }
        }catch(Exception $e){
            return view('cracha\buscarParticipante', compact('participante'))->with('error', 'Erro ao buscar participante!');
        }
    }
}