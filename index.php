<?php
use App\Controllers\CrudController;

//CREACION DE UN AUTOLOAD
spl_autoload_register(function($clase){
    $file = str_replace('\\', '/', $clase) . '.php';
    if(file_exists($file)){
        require_once $file;
    }else{
        echo "El archivo: '$file' No existe <br>";
    }
});

class Principal {
    public $nombre;
    public $paterno;
    public $materno;

    public function saludar(){
        echo "Hola bienvenido!!";
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        //RETORNO DE OBJETO PARA UN SOLO LLAMADO
        return $this;
    }

    public function setPaterno($paterno){
        $this->paterno = $paterno;
        //RETORNO DE OBJETO PARA UN SOLO LLAMADO
        return $this;
    }
    
    public function setMaterno($materno){
        $this->materno = $materno;
        //RETORNO DE OBJETO PARA UN SOLO LLAMADO
        return $this;
    }

    public function registro(){
        $crud = new CrudController();
        $crud->insert($this->nombre, $this->paterno, $this->materno);
        return "Registro creado: $this->nombre $this->paterno $this->materno";
    }
}

$persona = new Principal;
$persona->setNombre('Juan')
->setPaterno('Esteban')
->setMaterno('Pablo');

echo $persona->registro();







/*$query = "INSERT INTO usuarios(nombre, a_paterno, a_materno) values(:nombre,:paterno,:materno)";

$stmt = $pdo->prepare($query);
$stmt->execute([
    'nombre' => $nombre,
    'paterno' => $paterno,
    'materno' => $materno
]);*/


/*$host = "localhost";
$user = "root";
$pass = "";
$db = "pdo";

$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);
//CONFIGURACION GLOBAL DE OBTENCION DE DATOS COMO OBJETO
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$query = $pdo->query('SELECT * FROM usuarios');
*/
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
/*$nombre = "Juan Alberto";

$query = "SELECT * FROM usuarios WHERE nombre = :nombre";
$stmt = $pdo->prepare($query);
$stmt->execute([':nombre' => $nombre]);
$usuario = $stmt->fetchAll();
var_dump($usuario[0]->nombre);*/
?>