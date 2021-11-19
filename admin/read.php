<?php
    /*  1. Conectarme a la base de datos
        2. Construir una consulta SELECT.....
        3. Recoger los resultados y mostrarlos
    */
    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "SELECT * FROM productos";
    $result = $mysqli->query($sql);

    echo "<table class='table table-striped table-bordered'>";
    echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Unidades</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Imagen</th>";
        echo "<th>Accion</th>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        if (isset($_REQUEST["cod_producto"]) and $_REQUEST["cod_producto"] == $row['cod_producto']){
            // si me envias un parametro id y coincide con el de la linea pones esto
            echo "<tr>";
            echo "<form method='post' action='update.php' enctype='multipart/form-data'>";
            echo "<td><input type='text' id='nombre' name='nombre' value='".$row["nombre"]."'></td>";
            echo "<td><input type='text' id='precio' name='precio' value='".$row["precio"]."'></td>";
            echo "<td><input type='text' id='descripcion' name='descripcion' value='".$row["descripcion"]."'></td>";
            echo "<input type='hidden'name='cod_producto' value='".$row["cod_producto"]."'>";
            echo "<td><input type='file' id='fileToUpload' name='fileToUpload'></td>";
            echo "<td><input type='submit' value='Guardar'></td>";
            echo "</form>";
            echo "</tr>";
        } else {
            // si todo es normal se ejecute este trozo
            echo "<tr>";
            echo "<td width='20%'>".$row["nombre"]."</td>";
            echo "<td width='20%'>".$row["precio"]."</td>";
            echo "<td width='40%'>".$row["descripcion"]."</td>";
            echo "<td widht='15%'><img width='100%' src='../".$row["rutaimg"]."'</td>";
            echo "<td><a href='delete.php?cod_producto=".$row['cod_producto']."'><button type='button' class='btn btn-danger'>Borrar</button></a>";
            echo " <a href='productos.php?cod_producto=".$row['cod_producto']."'><button type='button' class='btn btn-warning'>Modificar</button></a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    $mysqli->close();
?>