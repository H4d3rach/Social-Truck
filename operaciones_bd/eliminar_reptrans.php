<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}
$data = file_get_contents("php://input");
$delete ="DELETE FROM usuario WHERE id_usuario='$data'";
$resultado = mysqli_query($conect,$delete);
session_unset();
session_destroy();
header('location: ../login.php');
?>