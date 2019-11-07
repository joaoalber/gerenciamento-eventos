<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateParticipante;
use App\{Evento, Participante};
use DB;

class ParticipanteController extends Controller
{
    public function index(){
        $participantes = Participante::paginate(5, ['*'], 'ativos')->onEachSide(2);
        $participantesInativos = Participante::onlyTrashed()->paginate(5, ['*'], 'inativos')->onEachSide(2);

        if ($participantes->currentPage() > 1 && $participantes->isEmpty()) {
            return redirect('participante?ativos='.(($participantes->currentPage())-1).'&inativos='.$participantesInativos->currentPage());
        }
        if ($participantesInativos->currentPage()> 1 && $participantesInativos->isEmpty()) {
            return redirect('participante?inativos='.($participantesInativos->currentPage()-1).'&ativos='.($participantes->currentPage()));
        }

        return view('participante.index', compact('participantes', 'participantesInativos'));
    }

    public function create(){
        $eventos = Evento::all(['id', 'nome']);
        return view('participante.form', compact('eventos'));
    }

    public function store(CreateParticipante $request){

        //Favor manter esses tipos de return comentados quando der push pro git. Vlw!
        // return ($request);
        DB::beginTransaction();
        
        
        try {
            $participante = Participante::create($request->all());
            $evento = Evento::find($request->eventos);
            $participante->evento()->attach($evento);
            DB::commit();
            return redirect('/participante')->with('success', 'participante cadastrado com sucesso.');
        } catch(Exception $e){
            DB::rollback();
            return $e;
        }
        
    }

    public function edit($id){
        $participante = Participante::findOrFail($id);
        // return($evento_participante->pivot->evento_id);
        return view('participante.atualizar', compact('participante'));
    }

    public function update(CreateParticipante $request, $id){
        DB::beginTransaction();

        try {
            $participante = Participante::findOrFail($id);
            $participante->update($request->all());
            DB::commit();
            return redirect('/participante')->with('success', 'participante atualizado com sucesso.');
        } catch(Exception $e){
            DB::rollback();
            return $e;
        }

    }

    public function destroy($id){
        DB::beginTransaction();
       
        try {
            $participante = Participante::withTrashed()->findOrFail($id);

            if($participante->trashed()){
                $participante->restore();
                DB::commit();
                return back()->with('success', 'Participante restaurado com sucesso.');    

            } else {
                $participante->delete();
                 DB::commit();
                return back()->with('success', 'Participante excluído com sucesso.');
            }  

        } catch(Exception $e){
            DB::rollback();
            return $e;
        }
    }

    public function show($id){
        $participante = Participante::findOrFail($id);
        $eventos = $participante->evento()->orderBy('nome')->withTrashed()->paginate(4);
        return view('participante.show', compact('participante', 'eventos'));
    }

   
   
}