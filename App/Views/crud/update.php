<?php


use App\Controllers\CrudController;

//CREACION DE UN AUTOLOAD
spl_autoload_register(function ($clase) {
    $file = str_replace('\\', '/', $clase) . '.php';
    if (file_exists('../../../' . $file)) {
        require_once '../../../' . $file;
    } else {
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

    <title>Crear registro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Registrados Datos</h1>
                <?php include('../../../menu.php') ?>
                <div class="card">
                    <div class="card-body">
                    <form action="../../Controllers/FormUsuarioUpdate.php" method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">Seleccione un registro</label>
                            <select name="id" id="id" class="form-control" aria-describedby="idHelp">
                                <?php
                                foreach ($datos as $key => $dato) {
                                    echo "<option value='$dato->id'>$dato->nombre</option>";
                                }                                
                                ?>
                            </select>
                            <div id="idHelp" class="form-text">Seleccione un dato.</div>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombreHelp">
                            <div id="nombreHelp" class="form-text">Escriba un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="a_paterno" class="form-label">Apellid Paterno</label>
                            <input type="text" name="a_paterno" class="form-control" id="a_paterno">
                        </div>
                        <div class="mb-3">
                            <label for="a_materno" class="form-label">Apellid Materno</label>
                            <input type="text" name="a_materno" class="form-control" id="a_materno">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>