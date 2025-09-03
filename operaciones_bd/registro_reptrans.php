<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}
    if(isset($_POST)){
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $telefono = $_POST['telefono'];
        $rol_id= 1;
        $estatus_id= 1;
        if(empty($_POST['ids'])){
            $id_user = $_SESSION['usuario']['id'];
            $consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
            $resultado = mysqli_query($conect,$consulta);
            $row1 = $resultado->fetch_array();
            $empresa_razon = $row1['empresa_razon'];
            $insert = "INSERT INTO usuario(id_usuario,nombre,primer_apellido,segundo_apellido,correo,contra,telefono,
            rol_id, estatus_id,empresa_razon) VALUES ('$id_usuario','$nombre','$primer_apellido','$segundo_apellido','$correo','$contra',
            '$telefono',$rol_id,$estatus_id,'$empresa_razon')";
            $query = mysqli_query($conect,$insert);
        }else{
            $id = $_POST['ids'];
            $update ="UPDATE usuario SET nombre='$nombre', primer_apellido='$primer_apellido', segundo_apellido='$segundo_apellido', 
            correo='$correo', contra='$contra',
            telefono = $telefono WHERE id_usuario='$id_usuario'";
            $resultado = mysqli_query($conect,$update);
        }
        
            }
?>