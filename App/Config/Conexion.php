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
        return $pdo;
    }
}