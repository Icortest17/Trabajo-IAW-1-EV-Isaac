<?php
    // recojo los valores que el usuario me envia
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dir_subida  = "img/productos/";
        // Esto me lo da el formulario al subir el archivo. fileToUpload es el name del input.
        $fichero_subido = $dir_subida . basename($_FILES["fileToUpload"]["name"]); 

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fichero_subido)) {
            // Mensaje de confirmación donde todo ha ido bien
            echo"<script>alert('El archivo se subio correctamente...');</script>";
        } else {
            // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
            echo '<p>¡Ups! Algo ha pasado.</p>';
        }
    }  
    
    
    $nombre = $_REQUEST["nombre"];
    $precio = $_REQUEST["precio"];
    $descripcion = $_REQUEST["descripcion"];

    /*
        1. Conectarme a la base de datos
        2. Construir un INSERT INTO.....
        3. Ejecutar la consulta
        4. Cerrar conexión
    */
    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "INSERT INTO PRODUCTOS (nombre, descripcion, precio, rutaimg) VALUES ('$nombre','$descripcion','$precio','$fichero_subido');";
    $mysqli->query($sql);
    $mysqli->close();


    // Redirecciona a otro sitio
    header("location: productos.php");
