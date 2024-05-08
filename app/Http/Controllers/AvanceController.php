<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Avance;

class AvanceController extends Controller
{
    public function index(){
        $avanceData=Avance::all();
        return view("index-avance")->with("avanceData",$avanceData);
    }

    public function store(Request $request){
        try {
            $sql=new Avance();
            $sql->avance = $request->input('txtNombreAvance');
            $sql->save();

        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){ 
            return back()->with("correcto","Avance registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
        
    }

    public function edit($id)
    {
        $avance = Avance::findOrFail($id);
        return view('avanceCrud.edit', compact('avance'));
    }

    public function updatea(Request $request, $id)
    {
        try{
            $avance = Avance::findOrFail($id);
            $avance->avance = $request->avance;
            $avance->save();
        }catch (\Throwable $th){
            $avance = 0;
        }
        if ($avance == true){
            return back()->with("correcto","Avance editado Correctamenta");
        }else{
            return back()->with("incorrecto","Avance no se editó");
        }

    }

    public function deletea($id){
        try{
            $sql = Avance::findOrFail($id);
            $sql->delete();
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Avance eliminada");
        }else{
            return back()->with("incorrecto","Avance no se eliminó");
        }
    }



}
