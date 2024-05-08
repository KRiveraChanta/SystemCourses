<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categoria;

use Illuminate\Support\Facades\Validator;
 

class CategoriaController extends Controller
{
    public function index(){
        $categoriaData=Categoria::all();
        return view("index-categoria")->with("categoriaData",$categoriaData);
    }
    
   public function store(Request $request){
        try {
            $sql=new Categoria;
            $sql->nombre_categoria = $request->input('txtNombreCategoria');
            $sql->save();

        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){ 
            return back()->with("correcto","Categoría registrada correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
        
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoriaCrud.edit', compact('categoria'));
    }

    public function updatea(Request $request, $id)
    {
        try{
            $categoria = Categoria::findOrFail($id);
            $categoria->nombre_categoria = $request->nombre_categoria;
            $categoria->save();
        }catch (\Throwable $th){
            $categoria = 0;
        }
        if ($categoria == true){
            return back()->with("correcto","Categoría editada Correctamenta");
        }else{
            return back()->with("incorrecto","Categoría no se editó");
        }

    }

    public function deletea($id){
        try{
            $sql = Categoria::findOrFail($id);
            $sql->delete();
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
