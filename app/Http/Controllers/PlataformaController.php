<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    public function index(){
        $plataformaData=DB::select("select * from plataforma");
        return view("index-plataforma")->with("plataformaData",$plataformaData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into plataforma(nombre_plataforma) values (?)", [
                $request->txtNombrePlataforma,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Plataforma registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try {
            $sql=DB::insert(" update plataforma set nombre_plataforma =? where id=?", [
                $request->txtNombrePlataforma,
                $request->txtId,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Plataforma editada correctamente");
        }else{
            return back()->with("incorrecto","Error al editar plataforma");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from plataforma where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Plataforma eliminada");
        }else{
            return back()->with("incorrecto","Plataforma no se eliminó");
        }
    }






}
