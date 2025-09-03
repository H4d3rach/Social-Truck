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
$data = file_get_contents("php://input");
$consulta ="SELECT razon_social,nombre_comercial,rfc,dirección_fiscal,dir_oficinas_principales
FROM empresa";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT razon_social,nombre_comercial,rfc,dirección_fiscal,dir_oficinas_principales FROM empresa WHERE
    razon_social LIKE'%$data%' OR nombre_comercial LIKE'%$data%' OR rfc LIKE'%$data%' OR dirección_fiscal LIKE'%$data%' 
    OR dir_oficinas_principales LIKE'%$data%' ";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[0]."</td>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td><form action='operaciones_bd/editar_empresa.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-success'>Editar</button></form>
    <form action='operaciones_bd/eliminar_empresa.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-danger'>Eliminar</button></form></td>";
}


?>