<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    //Index

    public function index(){
        $etiquetaData=Etiqueta::all();
        return view("index-etiqueta")->with("etiquetaData",$etiquetaData);
    }

    public function store(Request $request){
        try {
            $sql=new Etiqueta;
            $sql->nombre_etiqueta = $request->input('txtNombreEtiqueta');
            $sql->save();

        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){ 
            return back()->with("correcto","Etiqueta registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
        
    }

    public function edit($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetaCrud.edit', compact('etiqueta'));
    }

    public function updatea(Request $request, $id)
    {
        try{
            $etiqueta = Etiqueta::findOrFail($id);
            $etiqueta->nombre_etiqueta = $request->nombre_etiqueta;
            $etiqueta->save();
        }catch (\Throwable $th){
            $etiqueta = 0;
        }
        if ($etiqueta == true){
            return back()->with("correcto","Etiqueta editada Correctamenta");
        }else{
            return back()->with("incorrecto","Etiqueta no se editó");
        }

    }

    public function deletea($id){
        try{
            $sql = Etiqueta::findOrFail($id);
            $sql->delete();
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Etiqueta eliminada");
        }else{
            return back()->with("incorrecto","Etiqueta no se eliminó");
        }
    }


}
