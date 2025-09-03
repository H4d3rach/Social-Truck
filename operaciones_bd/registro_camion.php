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
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $transmision = $_POST['transmision'];
        $extra = $_POST['extra'];
        $marca_id = $_POST['marca'];
        $motor_id = $_POST['motor'];
        $tipo_id = $_POST['tipo'];
        $estatus_id = $_POST['estatus'];
        $sede_id = $_POST['sede'];

        if(empty($_POST['ids'])){
            $insert = "INSERT INTO camion VALUES ('$placa','$modelo',$transmision,'$extra',$motor_id,$marca_id,$tipo_id,$estatus_id,$sede_id)";
            echo"$insert";
            $query = mysqli_query($conect,$insert);
        }
        else{
            $id = $_POST['ids'];
            $update ="UPDATE camion SET modelo='$modelo', transmision=$transmision, extras='$extra', marca_id=$marca_id, motor_id=$motor_id,
            tipo_id = $tipo_id, estatus_id = $estatus_id, sede_id = $sede_id WHERE placa='$placa'";
            $resultado = mysqli_query($conect,$update);
        }
            }
?>