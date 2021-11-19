<?php
    /*
    1. Recoger los valores del usuario
    2. Conectarme a la bbdd
    3. Crear la sentencia UPDATE ..
    4. Ejecutamos
    5. Nos dirija a la pagina de index.php
    */

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
    $id = $_REQUEST["cod_producto"];
    $descripcion = $_REQUEST["descripcion"];

    $mysqli = new mysqli("localhost", "root", "", "tienda");
    $sql = "UPDATE productos SET nombre='$nombre', precio=$precio, descripcion='$descripcion', rutaimg='$fichero_subido'  WHERE cod_producto = $id";

    $mysqli->query($sql);
    $mysqli->close();

 

    // Redirecciona a otro sitio
  header("location: productos.php");


?>