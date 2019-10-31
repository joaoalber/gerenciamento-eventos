<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Participante, Evento};
use DB;
<<<<<<< HEAD
=======

>>>>>>> 2a74b32b5c42e8f7ce1aa0825785f074ee03e043

class EventoController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $eventos = Evento::all();
        return view('indexevento', compact('eventos'));
=======
        $eventos = Evento::paginate(5);
        return view('evento', compact('eventos'));
>>>>>>> 2a74b32b5c42e8f7ce1aa0825785f074ee03e043
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
return $request;
        // DB::beginTransaction();
        // try {
            $evento = Evento::create(
                [
                    'nome' => $request->nome,
                    'data' => $request->data,
                    'descricao' => $request->descricao,
                    'local' => $request->local,
                    'hora' => $request->hora
                ]
            );
        //     DB::commit();
        //     return redirect('/evento');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect('/evento');
        // }
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
<<<<<<< HEAD
=======

    public function listaPresenca($id) {
        $evento = Evento::findOrFail($id);
        return view('listapresenca', compact('evento'));
    }
    
>>>>>>> 2a74b32b5c42e8f7ce1aa0825785f074ee03e043
}