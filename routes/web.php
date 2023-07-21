<?php
use Lib\Route;
use App\Controllers\HomeController;
use App\Controllers\ParticipantesController;


Route::get('participantes', [ParticipantesController::class, 'index']);
Route::get('participantes/create', [ParticipantesController::class, 'create']);
Route::post('participantes/nuevo', [ParticipantesController::class, 'nuevo']);

Route::get('/', [HomeController::class, 'index']);
Route::get('contact', function(){
  return "Hola desde contact";
});
Route::get('about', function(){
  return "Hola desde about";
});
Route::get('cursos/:slug', function($slug){
  return "El curso es $slug";
});

Route::dispatch();
