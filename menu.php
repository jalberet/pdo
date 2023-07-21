<?php

function url_actual()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }
    return $url . $_SERVER['HTTP_HOST'];
}
?>
<div class="card text-center">
    <div class="card-body">
        <a href="<?php echo url_actual() ?>/pdo/App/Views/crud/create.php" type="button" class="btn btn-primary">Registrar</a>
        <a href="<?php echo url_actual() ?>/pdo/App/Views/crud/read.php" type="button" class="btn btn-warning">Consultar</a>
        <a href="<?php echo url_actual() ?>/pdo/App/Views/crud/update.php" type="button" class="btn btn-info">Actualizar</a>
        <a href="#" type="button" class="btn btn-danger">Eliminar</a>
    </div>
</div>