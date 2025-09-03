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
$data = file_get_contents("php://input");
$select ="SELECT * FROM camion where placa = '$data'";
$resultado = mysqli_query($conect,$select);
$row = $resultado->fetch_array();
echo json_encode($row);
?>