<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table='usuario';
    protected $primaryKey='id';
    protected $fillable=['login','contrasenia','nickname','correo','id_rol'];
    public $timestamps=false;
}
