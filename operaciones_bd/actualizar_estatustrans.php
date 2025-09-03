<?php
    include ("../conector.php");
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=3){
            header('location: login.php');
        }
    }
    $id_user = $_SESSION['usuario']['id'];
    if(isset($_POST['estado_estatus'])){
    $estatus = $_POST['estado_estatus'];
    $estatusU = "UPDATE usuario SET estatus_id =$estatus  WHERE id_usuario = '$id_user'";
    $upd = mysqli_query($conect,$estatusU);
    header('location: ../transportista.php');
    }
?>