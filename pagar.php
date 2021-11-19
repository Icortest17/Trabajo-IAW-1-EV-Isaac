<?php
include 'general/config.php';
include 'general/conexion.php';
include 'carrito.php';

if($_POST){
    $total=0;
    $correo=$_POST['email'];


    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);

    }


    $sentencia=$pdo->prepare("INSERT INTO `PEDIDOS` 
    (`fecha`, `correo`, `total`) 
    VALUES (NOW(),:correo,:total);");
    
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":total",$total);
    $sentencia->execute();
    $cod_pedido=$pdo->lastInsertId();

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

        $sentencia=$pdo->prepare("INSERT INTO `DETALLEPEDIDOS` 
        (`cod_pedido`, `cod_producto`) 
        VALUES (:cod_pedido,:cod_producto);");

    $sentencia->bindParam(":cod_pedido",$cod_pedido);
    $sentencia->bindParam(":cod_producto",$producto['cod_producto']);

    $sentencia->execute();

    }

  
    echo "<script>
    alert('El pedido se ha realizado correctamente');
    window.location= 'index.php'
    </script>";
}
?>