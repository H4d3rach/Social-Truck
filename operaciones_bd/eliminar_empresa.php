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
        $razon = $_POST['data'];
        $delete = "DELETE FROM empresa Where razon_social='$razon'";
        $resultado = mysqli_query($conect,$delete);
        header('location: ../gestion_Adminempresas.php');
            }

?>