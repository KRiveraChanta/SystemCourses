<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table='cursos';
    protected $primaryKey='id';
    protected $fillable=['titulo','url','descripcion','anio_publicacion','imagen_ref','id_profe','id_plataforma','id_nivel','id_categoria'];
    public $timestamps=false;

    public function selectProfesor(){
        return $this->hasOne(Profesor::class,'id','id_profe');
    }

    public function selectPlataforma(){
        return $this->hasOne(Plataforma::class,'id','id_plataforma');
    }

    public function selectAvance(){
        return $this->hasOne(Avance::class,'id','id_nivel');
    }

    public function selectCategoria(){
        return $this->hasOne(Categoria::class,'id','id_categoria');
    }

}
