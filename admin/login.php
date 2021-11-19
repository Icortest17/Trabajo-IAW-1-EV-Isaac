<?php
$usuario_correcto = "admin";
$contraseña_correcta = "123";


$usuario = $_POST["usuario"];
$contraseña = $_POST["palabra_secreta"];

if ($usuario === $usuario_correcto && $contraseña === $contraseña_correcta) {
   
    session_start();
    
    $_SESSION["usuario"] = $usuario;

    header("Location: productos.php");
} else { 
     echo "<script>
                alert('El usuario o la contraseña son incorrectos');
                window.location= 'index.php'
    </script>";
}