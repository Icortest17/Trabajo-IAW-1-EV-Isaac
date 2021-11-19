<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dir_subida  = "img/productos/";
            // Esto me lo da el formulario al subir el archivo. fileToUpload es el name del input.
            $fichero_subido = $dir_subida . basename($_FILES["fileToUpload"]["name"]); 

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fichero_subido)) {
                // Mensaje de confirmación donde todo ha ido bien
                echo '<p>Se subió perfectamente a la ruta: '. $fichero_subido .'</p>';
                // Muestra la imagen que acaba de ser subida
                echo '<p><img width="500" src="' . $fichero_subido . '"></p>';
            } else {
                // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
                echo '<p>¡Ups! Algo ha pasado.</p>';
            }
        }
    ?>
</body>
</html>