<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Curso;

use App\Models\Profesor;
use App\Models\Plataforma;
use App\Models\Avance;
use App\Models\Categoria;


class CursoController extends Controller
{
   public function index(){
    $cursoData=Curso::all();
    $profesorData=Profesor::all();
    $plataformaData=Plataforma::all();
    $avanceData=Avance::all();
    $categoriaData=Categoria::all();
    return view("index-curso")->with(['cursoData' => $cursoData, 
        'profesorData' => $profesorData,
        'plataformaData' => $plataformaData,
        'avanceData' => $avanceData,
        'categoriaData' => $categoriaData ]);
   }

   public function vistaCursos(){

    $cursoData = Curso::paginate(10);
    $profesorData=Profesor::all();
    $plataformaData=Plataforma::all();
    $avanceData=Avance::all();
    $categoriaData=Categoria::all();

    return view("vistaCursos")->with(['cursoData' => $cursoData, 
        'profesorData' => $profesorData,
        'plataformaData' => $plataformaData,
        'avanceData' => $avanceData,
        'categoriaData' => $categoriaData ]);
   }

   public function store(Request $request){

    try{
        $sql=new Curso;
        $sql->titulo=$request->input('txtNombreCurso');
        $sql->url=$request->input('txtUrl');
        $sql->anio_publicacion=$request->input('txtAño_publicacion');
        $sql->imagen_ref=$request->input('txtImagen_ref');
        $sql->id_profe=$request->input('Id_profe');
        $sql->id_plataforma=$request->input('Id_plataforma');
        $sql->id_nivel=$request->input('Id_avance');
        $sql->id_categoria=$request->input('Id_categoria');
        $sql->save();

    } catch (\Throwable $th){
        $sql=0;
    }
    if($sql == true){
        return back()->with("correcto","Curso registrado correctamente");
    }else{
        return back()->with("incorrecto","Error al registrar");
    } 

   }

   public function update(Request $request, $id){

    try {
        $curso = Curso::find($id);
        $curso->titulo=$request->input('txtNombreCurso');
        $curso->url=$request->input('txtUrl');
        $curso->anio_publicacion=$request->input('txtAño_publicacion');
        $curso->imagen_ref=$request->input('txtImagen_ref');
        $curso->id_profe=$request->input('Id_profe');
        $curso->id_plataforma=$request->input('Id_plataforma');
        $curso->id_nivel=$request->input('Id_avance');
        $curso->id_categoria=$request->input('Id_categoria');
        
        $curso->save();
        
        if ($curso) {
            return back()->with("correcto", "Curso editado correctamente");
        } else {
            return back()->with("incorrecto", "Error al editar Curso");
        }
    } catch (\Throwable $th) {
        return back()->with("incorrecto", "Error al editar Curso");
    }

    
    }

    public function delete($id){
        try{
            $curso = Curso::findOrFail($id);
            $curso -> delete();
        }catch (\Throwable $th){
            $curso = 0;
        }
        if ($curso == true){
            return back()->with("correcto","Curso eliminado");
        }else{
            return back()->with("incorrecto","Usuario no se eliminó");
        }
    }

}
