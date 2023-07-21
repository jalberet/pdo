<?php


use App\Controllers\CrudController;

//CREACION DE UN AUTOLOAD
spl_autoload_register(function($clase){
    $file = str_replace('\\', '/', $clase) . '.php';
    if(file_exists('../../../'.$file)){
        require_once '../../../'.$file;
    }else{
        echo "El archivo: '$file' No existe <br>";
    }
});
$nombre = "a";
$crud = new CrudController();
$datos = $crud->read($nombre);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>CRUD</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center">Datos registrados</h1>
        <?php include('../../../menu.php') ?>
        <div class="card text-center">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">A. Paterno</th>
                <th scope="col">A. Materno</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($datos as $key => $row){
                  echo '<tr>'.
                    '<th scope="row">'.$row->id.'</th>'.
                    '<td>'.$row->nombre.'</td>'.
                    '<td>'.$row->a_paterno.'</td>'.
                    '<td>'.$row->a_materno.'</td>'.
                  '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>