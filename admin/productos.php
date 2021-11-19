<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="../index.php">Tienda Isaac/admin</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="productos.php">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mostrarPedidos.php">PEDIDOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cerrar.php">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <br />
    <br />
    <br />
    <div class="alet alert-success">
        <h1>Añadir Productos</h1>
        <form class="row row-cols-lg-auto g-3 align-items-center" method="post" action="create.php" enctype="multipart/form-data">
            <div class="col-12">
                <label for="producto">Producto:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            <div class="col-12">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio">
            </div>
            <div class="col-12">
                <label for="Descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>
            <div class="col-12">
                <label for="fileToUpload">Imagen:</label>
                <input type="file" id="fileToUpload" name="fileToUpload">
            </div>
            <div class="col-12">
                <button type="submit" value="Enviar" name="Enviar" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    <br />
    <h1>Borrar o Modificar Productos</h1>
    <?php
    include("read.php");
    ?>

</body>

</html>