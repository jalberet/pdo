<?php
namespace App\Controllers;
use App\Models\Usuario;

//Controlador base
use App\Controllers\Controller;

class HomeController extends Controller{

    public function index(){
        return $this->view('home.index', [
            'title' => 'Titulo desde controller',
            'description' => 'Mi descripcion'
        ]);
    }

}