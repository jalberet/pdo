
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lista de participantes</h5>
                <div class="col-12">
                    <a class="btn btn-warning" href="/participantes" role="button">Atras</a>
                </div>

                <form action="nuevo" method="post">
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
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>