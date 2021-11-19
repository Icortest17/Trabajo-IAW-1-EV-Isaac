<?php
include 'general/config.php';
include 'general/conexion.php';
include 'carrito.php';
?>
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
        <a class="navbar-brand" href="index.php">Tienda Isaac</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mostrarCarrito.php">CARRITO(<?php
                                                                           echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                                            ?>)</a>
                </li>
            </ul>
        </div>
        </nav>
        <br />
        <br />
        <div class="container">
            <br>
            <?php if ($mensaje != "") { ?>
                <div class="alert alert-success">
                    <?php echo $mensaje; ?> 

                    <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
                </div>
            <?php } ?>
            <div class="row">
                <?php
                $sentencia = $pdo->prepare("SELECT * FROM `productos`");
                $sentencia->execute();
                $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
                ?>

                <?php foreach ($listaProductos as $producto) { ?>
                
                    <div class="col-sm-3">
                        <div class="card">
                            <img class="card-img-top" title="<?php echo $producto['nombre']; ?>" alt="<?php echo $producto['nombre']; ?>" src="<?php echo $producto['rutaimg']; ?>" height="250px">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                                <h5 class="card-title"><?php echo $producto['precio']; ?>€</h5>
                                <p class="card-text"><?php echo $producto['descripcion']; ?></p>

                                <form action="" method="post">

                                    <input type="hidden" name="cod_producto" id="cod_producto" value="<?php echo openssl_encrypt($producto['cod_producto'], COD, KEY); ?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">

                                    <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                        Agregar al carrito
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
</body>

</html>