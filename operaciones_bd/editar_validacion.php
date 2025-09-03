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
if (isset($_POST['data'])) {
    $id_user = $_POST['data'];
    $update ="UPDATE usuario SET estatus_id=1 WHERE id_usuario='$id_user'";
     $resultado = mysqli_query($conect,$update);    
            }
    header("location: ../administrador.php");
?>