<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    use HasFactory;

    protected $table='plataforma';
    protected $primaryKey='id';
    protected $fillable=['nombre_plataforma'];
    protected $guarded=[];
    public $timestamps=false;

}
