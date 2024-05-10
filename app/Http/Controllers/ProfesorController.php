<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    public function index(){
        $profesorData = Profesor::all();
        return view("index-profesor")->with("profesorData",$profesorData);
    }

    public function store(Request $request){
        try {
            $sql = new Profesor();
            $sql -> nombre_profesor = $request -> input('txtNombreProfesor');
            $sql -> save();
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Profesor registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesorCrud.edit', compact('profesor'));
    }

    public function updatea(Request $request, $id){
        try {
            $profesor = Profesor::findOrFail($id);
            $profesor -> nombre_profesor = $request -> nombre_profesor;
            $profesor -> save();

        } catch (\Throwable $th) {
            $profesor = 0;
        }
        if($profesor == true){
            return back()->with("correcto","Profesor editado correctamente");
        }else{
            return back()->with("incorrecto","Error al editar profesor");
        }

    }

    public function deletea($id){
        try{
            $profesor = Profesor::findOrFail($id);
            $profesor -> delete();
        }catch (\Throwable $th){
            $profesor = 0;
        }
        if ($profesor == true){
            return back()->with("correcto","Profesor eliminado");
        }else{
            return back()->with("incorrecto","Profesor no se eliminó");
        }
    }




}
