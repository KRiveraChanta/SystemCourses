<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    use HasFactory; 
    protected $table='avance';
    protected $primaryKey='id';
    protected $fillable=['avance'];
    protected $guarded=[];
    public $timestamps=false;
}
