<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index(){
        $rolData = Rol::all();
        return view("index-rol")->with("rolData",$rolData);
    }

    public function store(Request $request){
        try {
            $sql = new Rol();
            $sql -> nombre_rol = $request -> input('txtNombreRol');
            $sql -> save();
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Rol registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar rol");
        }

    }

    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('rolCrud.edit', compact('rol'));
    }

    public function updatea(Request $request, $id){
        try {
            $rol = Rol::findOrFail($id);
            $rol -> nombre_rol = $request -> nombre_rol;
            $rol -> save();
            
        } catch (\Throwable $th) {
            $rol=0;
        }
        if($rol == true){
            return back()->with("correcto","Rol editado correctamente");
        }else{
            return back()->with("incorrecto","Error al editar rol");
        }

    }

    public function deletea($id){
        try{
            $sql = Rol::findOrFail($id);
            $sql -> delete();
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Rol eliminado");
        }else{
            return back()->with("incorrecto","Rol no se eliminó");
        }
    }



}
