<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Plataforma;


class PlataformaController extends Controller
{
    public function index(){
        $plataformaData=Plataforma::all();
        return view("index-plataforma")->with("plataformaData",$plataformaData);
    }

    public function store(Request $request){
        try {
            $sql=new Plataforma();
            $sql->nombre_plataforma = $request->input('txtNombrePlataforma');
            $sql->save();
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Plataforma registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function edit($id)
    {
        $plataforma = Plataforma::findOrFail($id);
        return view('plataformaCrud.edit', compact('plataforma'));
    }

    public function updatea(Request $request,$id){
        try {
            $plataforma = Plataforma::findOrFail($id);
            $plataforma->nombre_plataforma = $request->nombre_plataforma;
            $plataforma->save();
        } catch (\Throwable $th) {
            $plataforma=0;
        }
        if($plataforma == true){
            return back()->with("correcto","Plataforma editada correctamente");
        }else{
            return back()->with("incorrecto","Error al editar plataforma");
        }
    }

    public function deletea($id){
        try{
            $plataforma = Plataforma::findOrFail($id);
            $plataforma->delete();
        }catch (\Throwable $th){
            $plataforma = 0;
        }
        if ($plataforma == true){
            return back()->with("correcto","Plataforma eliminada");
        }else{
            return back()->with("incorrecto","Plataforma no se eliminó");
        }
    }
}
