<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class CategoriaController extends Controller
{
    public function index(){
        $categoriaData=DB::select("select * from categoria");
        return view("index-categoria")->with("categoriaData",$categoriaData);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert(" insert into categoria(nombre_categoria) values (?)", [
                $request->txtNombreCategoria,
            ]);
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Categoría registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }

    }

    public function update(Request $request){
        try {
            $sql=DB::insert(" update categoria set nombre_categoria =? where id=?", [
                $request->txtNombreCategoria,
                $request->txtIdCategoria,
            ]);
            if ($sql==0){
                $sql=1;
            }
            
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto","Categoría editada correctamente");
        }else{
            return back()->with("incorrecto","Error al editar categoría");
        }

    }

    public function delete($id){
        try{
            $sql = DB::delete("delete from categoria where id=$id");
        }catch (\Throwable $th){
            $sql = 0;
        }
        if ($sql == true){
            return back()->with("correcto","Categoría eliminada");
        }else{
            return back()->with("incorrecto","Categoría no se eliminó");
        }
    }

}
