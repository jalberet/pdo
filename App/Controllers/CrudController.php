<?php
namespace App\Controllers;
use App\Config\Conexion;
use PDO;

//CREACION DE UN AUTOLOAD
spl_autoload_register(function($clase){
    $file = str_replace('\\', '/', $clase) . '.php';
    if(file_exists('../../'.$file)){
        require_once '../../'.$file;
    }else{
        echo "El archivo: '$file' No existe <br>";
    }
});
class CrudController {

    public function create($nombre, $paterno, $materno){
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

    public function read($nombre){
        $conexion = new Conexion;
        $pdo = $conexion->open();

        $query = "SELECT * FROM usuarios WHERE nombre LIKE :nombre";
        $stmt = $pdo->prepare($query);
        $nombre = "%$nombre%";
        $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function update($nombre, $paterno, $materno, $id){
        $conexion = new Conexion;
        $pdo = $conexion->open();

        $query = "UPDATE usuarios SET nombre=:nombre, a_paterno=:paterno, a_materno=:materno WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':paterno', $paterno, PDO::PARAM_STR);
        $stmt->bindParam(':materno', $materno, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $paterno = $_POST["a_paterno"];
    $materno = $_POST["a_materno"];

    // Llamar a la función para procesar los datos
    $registro = new CrudController();
    $registro->create($nombre, $paterno, $materno);
}*/