<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Participante;
use DB;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::all();
        return view('indexevento', compact('eventos'));
    }

    public function create(){
        $data = [
            'evento' => '',
            'url' => 'evento',
            'method' => 'post'
        ];
        return view('formEvento',compact('data'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $evento = Evento::create(
                [
                    'nome' => $request->nome,
                    'data' => '12-02-1992',
                    'descricao' => $request->descricao,
                    'local' => $request->local,
                    'hora' => $request->hora
                ]
            );
            DB::commit();
            return redirect('/evento');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/evento');
        }
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

    public function listaPresenca($id) {
        $evento = Evento::findOrFail($id);
        return view('listapresenca', compact('evento'));
    }
}