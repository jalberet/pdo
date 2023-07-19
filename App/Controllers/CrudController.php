<?php
namespace App\Controllers;
use App\Config\Conexion;

class CrudController {

    public function insert($nombre, $paterno, $materno){
        $conexion = new Conexion;
        $pdo = $conexion->open();

        $query = "INSERT INTO usuarios(nombre, a_paterno, a_materno) values(:nombre,:paterno,:materno)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno
        ]);
    }
}