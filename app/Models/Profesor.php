<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesor';
    protected $primarykey = 'id';
    protected $filllable = ['nombre_profesor'];
    protected $guarded = [];
    public $timestamps = false;
}
