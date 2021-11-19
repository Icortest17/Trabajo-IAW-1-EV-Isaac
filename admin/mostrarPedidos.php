<?php
include '../general/config.php';
include '../general/conexion.php';
include '../carrito.php';
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
        <a class="navbar-brand" href="index.php">Tienda Isaac/admin</a>
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
        <div class="container">
            <br>
            <div class="row">
                <?php
                $sentencia = $pdo->prepare("SELECT * FROM `pedidos` order by fecha desc");
                $sentencia->execute();
                $listaPedidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <h1>Pedidos Por Fecha</h1>
                
                    <table class='table table-striped table-bordered'>
                    <tr>
                    <th>Num Pedido</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    </tr>
                    <?php foreach ($listaPedidos as $pedido) { ?>
                    <?php
                    $sentencia = $pdo->prepare("select * from productos where cod_producto in (select cod_producto from detallepedidos where cod_pedido in (select cod_pedido from pedidos where cod_pedido=:id_pedido));");
                    $sentencia->bindParam(':id_pedido', $pedido["cod_pedido"]);
                    $sentencia->execute();
                    $listaProdPed = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <tr>
                    <th><?php echo $pedido["cod_pedido"] ?></th>
                    <th><?php echo $pedido["correo"] ?></th>
                    <th><?php echo $pedido["fecha"] ?></th>
                    <th><?php echo $pedido["total"] ?></th>
                    </tr>
                    <?php foreach ($listaProdPed as $prodped) { ?>
                        <tr>
                        <td></td>
                        <td><?php echo $prodped["nombre"] ?></td>
                        <td><?php echo $prodped["descripcion"] ?></td>
                        <td><?php echo $prodped["precio"] ?></td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </table>
                    <?php
                $sentencia = $pdo->prepare("SELECT * FROM `pedidos` order by total desc");
                $sentencia->execute();
                $listaPedidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <h1>Pedidos Por Total</h1>
                
                    <table class='table table-striped table-bordered'>
                    <tr>
                    <th>Num Pedido</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    </tr>
                    <?php foreach ($listaPedidos as $pedido) { ?>
                    <?php
                    $sentencia = $pdo->prepare("select * from productos where cod_producto in (select cod_producto from detallepedidos where cod_pedido in (select cod_pedido from pedidos where cod_pedido=:id_pedido));");
                    $sentencia->bindParam(':id_pedido', $pedido["cod_pedido"]);
                    $sentencia->execute();
                    $listaProdPed = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <tr>
                    <th><?php echo $pedido["cod_pedido"] ?></th>
                    <th><?php echo $pedido["correo"] ?></th>
                    <th><?php echo $pedido["fecha"] ?></th>
                    <th><?php echo $pedido["total"] ?></th>
                    </tr>
                    <?php foreach ($listaProdPed as $prodped) { ?>
                        <tr>
                        <td></td>
                        <td><?php echo $prodped["nombre"] ?></td>
                        <td><?php echo $prodped["descripcion"] ?></td>
                        <td><?php echo $prodped["precio"] ?></td>
                        </tr>
                    <?php } ?>
                    <?php } ?>
                    </table>

                
            </div>
</body>

</html>