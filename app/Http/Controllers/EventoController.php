<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Evento, Participante};
use DB;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::paginate(5, ['*'], 'ativos')->onEachSide(2);
        $eventosInativos = Evento::orderBy('deleted_at', 'desc')->onlyTrashed()->paginate(5, ['*'], 'inativos')->onEachSide(2);

        if ($eventos->currentPage() > 1 && $eventos->isEmpty()) {
            return redirect('evento?ativos='.(($eventos->currentPage())-1).'&inativos='.$eventosInativos->currentPage());
        }
        if ($eventosInativos->currentPage()> 1 && $eventosInativos->isEmpty()) {
            return redirect('evento?inativos='.($eventosInativos->currentPage()-1).'&ativos='.($eventos->currentPage()));
        }

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
                    'hora' => $request['evento']['hora'],
                    'cancelado' => 0
                ]
            );

            DB::commit();
            return redirect('evento')->with('success', 'Evento cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return redirect('evento')->with('error', 'Erro ao cadastrar evento!');
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
    DB::beginTransaction();
    try {
        $evento = Evento::findOrFail($id);
        $evento->update(
            [
                'nome' => $request['evento']['nome'],
                'data' => $request['evento']['data'],
                'hora' => $request['evento']['hora'],
                'descricao' => $request['evento']['descricao'],
                'local' => $request['evento']['local'],
                'cancelado' => $request['evento']['cancelado']
            ]
        );
        DB::commit();
        return redirect('/evento')->with('success', 'Evento atualizado com sucesso!');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/evento')->with('error', 'Erro ao atualizar evento!');
    }
    }

    public function destroy($id){
    DB::beginTransaction();
    try {
        $evento = Evento::withTrashed()->findOrFail($id);
        if($evento->trashed()){
            $evento->restore();
            DB::commit();
            return back()->with('success','Evento restaurado com sucesso!');
        } else {
            $evento->delete();
            DB::commit();
            return back()->with('success','Evento deletado com sucesso!');
        }
    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error','Erro ao realizar ação.');
    }
    }

    public function listaPresenca($id) {
        $evento = Evento::findOrFail($id);
        return view('listapresenca', compact('evento'));
    }


    public function AdicionaParticipante($id){
        $participantes = Participante::orderBy('nome')->get();
        $evento = Evento::findOrFail($id);
        $data = [
            'evento_id' => $id
        ];
        $evento_participante = $evento->participante()->get();

        return view('adiciona',compact('data','participantes', 'evento_participante'));
    }

    public function salvaParticipante(Request $request){
        
        DB::beginTransaction();
        try {
            $evento = Evento::findOrFail($request['evento_id']);
            $evento->participante()->detach();
            $evento->participante()->attach($request['participantes']);
            DB::commit();
            return redirect('evento')->with('success','Participantes cadastrados com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('evento')->with('error','Erro ao cadastrar participantes!');
        }
    }
}