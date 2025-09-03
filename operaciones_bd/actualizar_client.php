<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}
$id_usuario = $_SESSION['usuario']['id'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $telefono = $_POST['telefono'];
            $update ="UPDATE usuario SET nombre='$nombre', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', 
            correo='$correo', contra='$contra',
            telefono = $telefono WHERE id_usuario='$id_usuario'";
            $resultado = mysqli_query($conect,$update);
            header('location: ../editarperfil_client.php')
            ?>