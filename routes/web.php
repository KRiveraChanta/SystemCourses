<?php
use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;



/* Route::get('/posts', [PruebaController::class,'index'])->name('posts'); */



Route::get('/', function () {
    return view('inicio');
});

Route::get("/index-categoria",[CategoriaController::class,"index"])->name("crud.index");


//Nueva Categoria
Route::post("/crear-categoria",[CategoriaController::class,"create"])->name("crud.create");


//Editar Categoria
Route::post("/editar-categoria",[CategoriaController::class,"update"])->name("crud.update");

//Eliminar Categoria
Route::get("/eliminar-categoria-{id}",[CategoriaController::class,"delete"])->name("crud.delete");

/* Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
}); */