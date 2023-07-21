<?php
use App\Controllers\CrudController;

//CREACION DE UN AUTOLOAD
spl_autoload_register(function($clase){
    $file = str_replace('\\', '/', $clase) . '.php';
    if(file_exists('../../'.$file)){
        require_once '../../'.$file;
    }else{
        echo "El archivo: '$file' No existe <br>";
    }
});

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $paterno = $_POST["a_paterno"];
    $materno = $_POST["a_materno"];

    // Llamar a la función para procesar los datos
    $registro = new CrudController();
    $registro->update($nombre, $paterno, $materno, $id);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>