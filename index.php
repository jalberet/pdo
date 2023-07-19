<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pdo";

$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);
//CONFIGURACION GLOBAL DE OBTENCION DE DATOS COMO OBJETO
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$query = $pdo->query('SELECT * FROM usuarios');

//POR DEFAULT LOS MUESTRA COMO UN ARRAY
/*while ($fila = $query->fetch()) {
    echo $fila['nombre'];
    echo '<br>';
}*/

//SE PUEDE CONFIGURAR PARA MOSTRAR COMO OBJETO
/*while ($fila = $query->fetch(PDO::FETCH_OBJ)) {
    echo $fila->nombre;
    echo '<br>';
}*/

//SE PUEDE CONFIGURAR DE FORMA GLOBAL
/*while ($fila = $query->fetch()) {
    echo $fila->nombre;
    echo '<br>';
}*/

//PARAMETROS POSICIONALES PARA EVITAR INYECCION DE SQL
/*$nombre = "Juan Alberto";

$query = "SELECT * FROM usuarios WHERE nombre = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$nombre]);
$usuario = $stmt->fetch();
var_dump($usuario);
*/
//PARAMETROS POSICIONALES ANONIMOS PARA EVITAR INYECCION DE SQL
$nombre = "Juan Alberto";

$query = "SELECT * FROM usuarios WHERE nombre = :nombre";
$stmt = $pdo->prepare($query);
$stmt->execute([':nombre' => $nombre]);
$usuario = $stmt->fetchAll();
var_dump($usuario[0]->nombre);
?>