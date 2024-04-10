<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class PruebaController {

    public function index(){
        $categoria = DB::table('categoria')->get();
        return view('posts',['categoria'=>$categoria]);
    }


}