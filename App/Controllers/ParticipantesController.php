<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\Usuario;

class ParticipantesController extends Controller{

    public function index(){
        $participantes = new Usuario();

        return $this->view('participantes/index',[
            'participantes' => $participantes->all()
        ]);
    }

    public function create(){
        return $this->view('participantes/create');
    }

    public function nuevo(){
        $request = $_POST;
        $usuario = new Usuario();
        $usuario->create([
            'nombre' => $request['nombre'],
            'a_paterno' => $request['a_paterno'],
            'a_materno' => $request['a_materno'],
        ]);

        $participantes = new Usuario();

        return $this->view('participantes/index',[
            'participantes' => $participantes->all()
        ]);
    }
}