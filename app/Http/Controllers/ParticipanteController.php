<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Evento, Participante};


class ParticipanteController extends Controller
{
    public function index(){
        $participantes = Participante::all();
        return view('indexparticipante', compact('participantes'));
    }
    public function create(){
        return view('formparticipante');
    }
    public function store(Request $request){
        $participante = Participante::create(
            [
                'nome' => $request->nome,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'dataNascimento' => $request->dataNascimento,
                'organizacao' => $request->organizacao
            ]
        );
        return redirect('/participante');
    }
    public function edit($id){
        $participante = Participante::findOrFail($id);
        return view('formparticipante', compact('participante'));
    }
    public function update(Request $request, $id){
        $participante = Participante::findOrFail($id);
        $participante->update(
            [
                'nome' => $request->nome,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'dataNascimento' => $request->dataNascimento,
                'organizacao' => $request->organizacao
            ]
        );
        //$participante->update($request->all());
        return redirect('/participante');
    }
    public function delete($id){
        $participante = Participante::withTrashed()->findOrFail($id);
        if($participante->trashed()){
            $participante->restore();
            return back()->with('success','Participante restaurado com sucesso!');
        } else {
            $participante->delete();
            return back()->with('success','Participante deletado com sucesso!');
        }
    }
}