<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Participante;
use DB;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::paginate(5);
        $eventosInativos = Evento::onlyTrashed()->paginate(5);
        return view('evento', compact('eventos', 'eventosInativos'));
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
                    'nome' => $request['evento']['nome'],
                    'data' => $request['evento']['data'],
                    'descricao' => $request['evento']['descricao'],
                    'local' => $request['evento']['local'],
                    'hora' => $request['evento']['hora']
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
        $data = [
            'evento' => $evento,
            'url' => 'evento/'.$id,
            'method' => 'PUT'
        ];
        
        return View('formEvento',compact('data'));
    }



    public function update(Request $request, $id){
        $evento = Evento::findOrFail($id);
        $evento->update(
            [
                'nome' => $request['evento']['nome'],
                'data' => $request['evento']['data'],
                'hora' => $request['evento']['hora'],
                'descricao' => $request['evento']['descricao'],
                'local' => $request['evento']['local']
            ]
        );
        
        return redirect('/evento');
    }

    public function destroy($id){
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


    public function AdicionaParticipante($id){
        $participantes = Participante::all();
        $evento = Evento::findOrFail($id);
        $data = [
            'evento_id' => $id
        ];
        $evento_participante = $evento->participante()->get();
        // return($evento_participante);
        return view('adiciona',compact('data','participantes', 'evento_participante'));
    }

    public function salvaParticipante(Request $request){
        // $evento = $request['evento_id'];
        // $participantes = $request['participantes'];
        // return $request;
        //(Flávio) Correção para permitir cadastro e retirada de participantes do evento.
        DB::beginTransaction();
        try {
            $evento = Evento::findOrFail($request['evento_id']);
            $evento->participante()->detach();
            $evento->participante()->attach($request['participantes']);
            DB::commit();
            return redirect('/evento')->with('success','Participantes cadastrados com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/evento')->with('error','Erro ao cadastrar participantes!');
        }

        // $evento = Evento::FindOrFail($request['evento_id']);

        // foreach($request['participantes'] as $participante_id){
        //     $evento->participante()->attach($participante_id);
        // }
        //dd($request['participantes']);
    }
}