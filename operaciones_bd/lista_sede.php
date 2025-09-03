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
$id_user = $_SESSION['usuario']['id'];
$consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
$resultado = mysqli_query($conect,$consulta);
$row1 = $resultado->fetch_array();
$empresa_razon = $row1['empresa_razon'];
$consulta ="SELECT id_sede,nombre,direccion FROM sede WHERE empresa_rs = '$empresa_razon'";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta = "SELECT id_sede,nombre,direccion FROM sede WHERE empresa_rs = '$empresa_razon' AND (nombre LIKE '%$data%' OR direccion LIKE '%$data%') ";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td><button type='button' class='btn btn-success' onClick=Editar('".$data[0]."')>Editar</button>
    <button type='button' class='btn btn-danger' onClick=Eliminar('".$data[0]."')>Eliminar</button></td>";
}


?>