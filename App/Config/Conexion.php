<?php
namespace App\Config;

use PDO;

class Conexion {
    public function open(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "pdo";

        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        //CONFIGURACIÓN PARA LECTURA DE DATOS COMO OBJETOS
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    }
}