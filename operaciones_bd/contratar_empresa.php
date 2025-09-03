<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['usuario']['rol']!=2){
        header('location: login.php');
    }
}
    if(isset($_POST)){
        $viaje_id = $_POST['data'];
        $id_usuario = $_POST['data2'];
        $update = "UPDATE viaje SET representante_trans_id = '$id_usuario', estatus_id=2 WHERE id_viaje=$viaje_id";
        echo"$update";
        $upd = mysqli_query($conect,$update);
        $delete = "DELETE FROM postulacion WHERE viaje_id = $viaje_id";
        echo"$delete";
        $del = mysqli_query($conect,$delete);
        $_SESSION['id_viaje']=$viaje_id;
        header('location: ../detalles_viaje.php');
        exit;
    }
?>
