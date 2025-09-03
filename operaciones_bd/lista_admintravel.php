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
$id_user = $_SESSION['usuario']['id'];
$data = file_get_contents("php://input");
$consulta ="SELECT id_viaje,descripcion, fecha_inicio, fecha_fin, estatus_v.estatus, representante_trans_id, representante_cliente FROM viaje,estatus_v WHERE viaje.estatus_id = estatus_v.id_estatus
AND viaje.estatus_id>2";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT id_viaje,descripcion, fecha_inicio, fecha_fin, estatus_v.estatus, representante_trans_id, representante_cliente FROM viaje,estatus_v WHERE viaje.estatus_id = estatus_v.id_estatus
    AND viaje.estatus_id>2 AND (id_viaje LIKE'%$data%' OR descripcion LIKE'%$data%' OR fecha_inicio LIKE'%$data%' OR fecha_fin LIKE'%$data%' 
    OR estatus_v.estatus LIKE'%$data%')";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    $representante_trans_id = $data[5];
    $representante_cliente = $data[6];
    $sel1 = "SELECT nombre, primer_apellido, empresa_razon FROM usuario WHERE id_usuario='$representante_trans_id'";
    $resultado = mysqli_query($conect,$sel1);
    $row1 = $resultado -> fetch_array();
    $razont = $row1['empresa_razon'];
    $sel2 = "SELECT nombre, primer_apellido, empresa_razon FROM usuario WHERE id_usuario='$representante_cliente'";
    $resultado = mysqli_query($conect,$sel2);
    $row2 = $resultado -> fetch_array();
    $razonc = $row2['empresa_razon'];
    echo"<tr>
    <td>".$razonc."</td>
    <td>".$razont."</td>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td><form action='detalles_viajeadmin.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-success'>Detalles</button></form></td>";
}