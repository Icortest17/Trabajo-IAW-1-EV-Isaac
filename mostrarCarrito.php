<?php
include 'general/config.php';
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

    <<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <img id="logo" src="img/logo.png" width="50px" height="50px" />
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
            <h3>Lista del carrito</h3>
            <?php if (!empty($_SESSION['CARRITO'])) { ?>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th width="40%">Descripción</th>
                            <th width="15%" class="text-center">Cantidad</th>
                            <th width="20%" class="text-center">Precio</th>
                            <th width="20%" class="text-center">Total</th>
                            <th width="5%">--</th>
                        </tr>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>

                            <tr>

                                <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                                <td width="20%" class="text-center"><?php echo $producto['PRECIO'] ?></td>
                                <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>
                                <td width="5%">

                                    <form action="" method="post">

                                        <input type="hidden" name="cod_producto" id="cod_producto" value="<?php echo openssl_encrypt($producto['cod_producto'], COD, KEY); ?>">

                                        <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                                    </form>
                                </td>

                            </tr>
                            <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                        <?php } ?>
                        <tr>
                            <td colspan="3">
                                <h3>Total</h3>
                            </td>
                            <td>
                                <h3><?php echo number_format($total, 2) ?>€</h3>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <button class="btn btn-danger" type="submit" name="vaciar" value="vaciar">Vaciar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <form action="pagar.php" method="post">
                                    <div class="alert alert-success">
                                        <div class="form-group">
                                            <label for="email">Correo de contacto:</label>
                                            <input id="email" name="email" class="form-control" type="email" placeholder="Por favor escribe tu correo" required>
                                        </div>
                                        <small id="notificacion" class="form-text text-muted">
                                            Los productos se relaccionaran con este correo
                                        </small>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">
                                        Proceder a pagar >>
                                    </button>

                                </form>


                            </td>
                        </tr>
                    </tbody>
                </table>

            <?php } else { ?>
                <div class="alert alert-danger">
                    No hay productos en el carrito
                </div>
            <?php } ?>
</body>

</html>