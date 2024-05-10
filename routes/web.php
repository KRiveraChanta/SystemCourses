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
Route::get("/index-categoria",[CategoriaController::class,"index"])->name("categoriaCrud.index");
//Nueva 
Route::post("/crear-categoria",[CategoriaController::class,"store"])->name("categoriaCrud.store");
//Editar 
Route::get('/editar-categoria/{id}', [CategoriaController::class, 'edit'])->name('categoriaCrud.edit');
Route::put('/actualizar-categoria/{id}', [CategoriaController::class, 'updatea'])->name('categoriaCrud.updatea');
//Eliminar 
Route::get("/eliminar-categoria/{id}",[CategoriaController::class,"deletea"])->name("categoriaCrud.deletea");


//Etiqueta

// Listar
Route::get("/index-etiqueta",[EtiquetaController::class,"index"])->name("etiquetaCrud.index");

//Nueva
Route::post("/crear-etiqueta",[EtiquetaController::class,"store"])->name("etiquetaCrud.store");

//Editar
Route::get("/editar-etiqueta/{id}",[EtiquetaController::class,"edit"])->name("etiquetaCrud.edit");
Route::put("/actualizar-etiqueta/{id}",[EtiquetaController::class,"updatea"])->name("etiquetaCrud.updatea");

//Eliminar 
Route::get("/eliminar-etiqueta/{id}",[EtiquetaController::class,"deletea"])->name("etiquetaCrud.deletea");


//Avance

// Listar
Route::get("/index-avance",[AvanceController::class,"index"])->name("avanceCrud.index");

//Nueva
Route::post("/crear-avance",[AvanceController::class,"store"])->name("avanceCrud.store");

//Editar
Route::get("/editar-avance/{id}",[AvanceController::class,"edit"])->name("avanceCrud.edit");
Route::put("/actualizar-avance/{id}",[AvanceController::class,"updatea"])->name("avanceCrud.updatea");

//Eliminar 
Route::get("/eliminar-avance/{id}",[AvanceController::class,"deletea"])->name("avanceCrud.deletea");



//Plataforma

// Listar
Route::get("/index-plataforma",[PlataformaController::class,"index"])->name("plataformaCrud.index");

//Nueva
Route::post("/crear-plataforma",[PlataformaController::class,"store"])->name("plataformaCrud.store");

//Editar
Route::get("/editar-plataforma/{id}",[PlataformaController::class,"edit"])->name("plataformaCrud.edit");
Route::put("/actualizar-plataforma/{id}",[PlataformaController::class,"updatea"])->name("plataformaCrud.updatea");

//Eliminar 
Route::get("/eliminar-plataforma/{id}",[PlataformaController::class,"deletea"])->name("plataformaCrud.delete");


//Profesor

// Listar
Route::get("/index-profesor",[ProfesorController::class,"index"])->name("profesorCrud.index");

//Nueva
Route::post("/crear-profesor",[ProfesorController::class,"store"])->name("profesorCrud.store");

//Editar
Route::get("/editar-profesor/{id}",[ProfesorController::class,"edit"])->name("profesorCrud.edit");
Route::put("/actualizar-profesor/{id}",[ProfesorController::class,"updatea"])->name("profesorCrud.updatea");

//Eliminar 
Route::get("/eliminar-profesor/{id}",[ProfesorController::class,"deletea"])->name("profesorCrud.deletea");



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