<?php
require_once '../autoload.php';
use Lib\Route;

Route::get('/', function(){
  echo "Hola desde home";
});
Route::get('/contact', function(){
  echo "Hola desde contact";
});
Route::get('/about', function(){
  echo "Hola desde about";
});
?>
<!--!doctype html>
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
        <h1 class="text-center">Bienvenido</h1>
        <?php include('menu.php') ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html-->