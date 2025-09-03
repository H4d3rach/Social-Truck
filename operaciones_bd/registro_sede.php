<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['usuario']['rol']!=1){
        header('location: login.php');
    }
}
    if(isset($_POST)){
        $nombre = $_POST['nombre_sede'];
        $direccion = $_POST['direccion_sede'];
        $id_user = $_SESSION['usuario']['id'];
        if(empty($_POST['ids'])){
        $consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
        $resultado = mysqli_query($conect,$consulta);
        if($row = $resultado->fetch_array()){
            $empresa_razon = $row['empresa_razon'];
            $insert = "INSERT INTO sede(nombre, direccion,empresa_rs) VALUES ('$nombre','$direccion','$empresa_razon')";
            $query = mysqli_query($conect,$insert);
            }}
        else{
            $id = $_POST['ids'];
            $update ="UPDATE sede SET nombre = '$nombre', direccion='$direccion' WHERE id_sede=$id";
            $resultado = mysqli_query($conect,$update);
        }
            }
?>