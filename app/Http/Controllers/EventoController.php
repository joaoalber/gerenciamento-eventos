<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Participante, Evento};


class EventoController extends Controller
{
    public function index(){
        // $eventos = Evento::all();
        // return view('evento', compact('eventos'));
        return view('evento');
    }
    public function create(){
        return view('formevento');
    }
    public function store(Request $request){
        $evento = Evento::create(
            [
                'nome' => $request->nome,
                'data' => $request->data,
                'hora' => $request->hora,
                'descricao' => $request->descricao,
                'local' => $request->local
            ]
        );
        return redirect('/evento');
    }
    public function edit($id){
        $evento = Evento::findOrFail($id);
        return view('formevento', compact('evento'));
    }
    public function update(Request $request, $id){
        $evento = Evento::findOrFail($id);
        $evento->update(
            [
                'nome' => $request->nome,
                'data' => $request->data,
                'hora' => $request->hora,
                'descricao' => $request->descricao,
                'local' => $request->local
            ]
        );
        //$evento->update($request->all());
        return redirect('/evento');
    }
    public function delete($id){
        $evento = Evento::withTrashed()->findOrFail($id);
        if($evento->trashed()){
            $evento->restore();
            return back()->with('success','Evento restaurado com sucesso!');
        } else {
            $evento->delete();
            return back()->with('success','Evento deletado com sucesso!');
        }
    }
    public function listaPresenca(){
        $eventos = Evento::all();
        return view('listapresenca', compact('eventos'));
    }
}