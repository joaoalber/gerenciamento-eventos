<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateParticipante;
use App\{Evento, Participante};
use DB;

class ParticipanteController extends Controller
{
    public function index(){
        $participantes = Participante::all();
        return view('participante.index', compact('participantes'));
    }

    public function create(){
        return view('participante.form');
    }

    public function store(CreateParticipante $request){
     
        DB::beginTransaction();
        
        try {
            $participante = Participante::create($request->all());
            DB::commit();
            return redirect('/participante')->with('success', 'participante cadastrado com sucesso.');
        } catch(Exception $e){
            DB::rollback();
            return $e;
        }
        
    }

    public function edit($id){
        $participante = Participante::findOrFail($id);
        return view('participante.form', compact('participante'));
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
        return view('participante.show', compact('participante'));
    }

   
   
}