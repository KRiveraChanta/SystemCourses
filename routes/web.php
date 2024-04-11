<?php
use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\AvanceController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

/* Route::get('/posts', [PruebaController::class,'index'])->name('posts'); */



Route::get('/', function () {
    return view('inicio');
});


//Categoria

// listar 
Route::get("/index-categoria",[CategoriaController::class,"index"])->name("crud.index");

//Nueva 
Route::post("/crear-categoria",[CategoriaController::class,"create"])->name("crud.create");

//Editar 
Route::post("/editar-categoria",[CategoriaController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-categoria-{id}",[CategoriaController::class,"delete"])->name("crud.delete");


//Etiqueta

// Listar
Route::get("/index-etiqueta",[EtiquetaController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-etiqueta",[EtiquetaController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-etiqueta",[EtiquetaController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-etiqueta-{id}",[EtiquetaController::class,"delete"])->name("crud.delete");




//Avance

// Listar
Route::get("/index-avance",[AvanceController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-avance",[AvanceController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-avance",[AvanceController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-avance-{id}",[AvanceController::class,"delete"])->name("crud.delete");



//Plataforma

// Listar
Route::get("/index-plataforma",[PlataformaController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-plataforma",[PlataformaController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-plataforma",[PlataformaController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-plataforma-{id}",[PlataformaController::class,"delete"])->name("crud.delete");


//Profesor

// Listar
Route::get("/index-profesor",[ProfesorController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-profesor",[ProfesorController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-profesor",[ProfesorController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-profesor-{id}",[ProfesorController::class,"delete"])->name("crud.delete");



//Roles

// Listar
Route::get("/index-rol",[RolController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-rol",[RolController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-rol",[RolController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-rol-{id}",[RolController::class,"delete"])->name("crud.delete");



//Usuarios

// Listar
Route::get("/index-usuario",[UsuarioController::class,"index"])->name("crud.index");

//Nueva
Route::post("/crear-usuario",[UsuarioController::class,"create"])->name("crud.create");

//Editar
Route::post("/editar-usuario/{id}",[UsuarioController::class,"update"])->name("crud.update");

//Eliminar 
Route::get("/eliminar-usuario-{id}",[UsuarioController::class,"delete"])->name("crud.delete");