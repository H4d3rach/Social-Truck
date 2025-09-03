<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['usuario']['rol']!=4){
        header('location: login.php');
    }
}
    if(isset($_POST)){
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $telefono = $_POST['telefono'];
        $id = $_POST['ids'];
        $update ="UPDATE usuario SET nombre='$nombre', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', 
        correo='$correo', contra='$contra',
        telefono = $telefono WHERE id_usuario='$id_usuario'";
        echo"update $update";
        $resultado = mysqli_query($conect,$update);
            }
?>