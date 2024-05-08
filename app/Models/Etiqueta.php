<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $table='etiqueta';
    protected $primaryKey='id';
    protected $fillable=['nombre_etiqueta'];
    protected $guarded=[];
    public $timestamps=false;


}
