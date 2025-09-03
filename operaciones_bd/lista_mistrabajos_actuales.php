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

$consulta ="SELECT empresa.razon_social, usuario.id_usuario, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
, viaje.fecha_inicio, estatus_v.estatus, viaje.id_viaje FROM empresa,usuario,viaje,estatus_v WHERE viaje.representante_cliente=usuario.id_usuario
 AND usuario.empresa_razon = empresa.razon_social AND viaje.estatus_id = estatus_v.id_estatus AND viaje.representante_trans_id = '$id_user' AND NOT viaje.estatus_id=1 AND NOT viaje.estatus_id=5
 AND NOT viaje.estatus_id=6";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta = "SELECT empresa.razon_social, usuario.id_usuario, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
    , viaje.fecha_inicio, estatus_v.estatus, viaje.id_viaje FROM empresa,usuario,viaje,estatus_v WHERE viaje.representante_cliente=usuario.id_usuario
     AND usuario.empresa_razon = empresa.razon_social AND viaje.estatus_id = estatus_v.id_estatus AND viaje.representante_trans_id = '$id_user' AND NOT viaje.estatus_id=1 AND NOT viaje.estatus_id=5
     AND NOT viaje.estatus_id=6 AND (empresa.razon_social LIKE '%$data%' OR viaje.lugar_recogida LIKE '%$data%' OR viaje.lugar_destino LIKE '%$data%' 
     OR viaje.descripcion LIKE '%$data%' OR viaje.fecha_inicio LIKE '%$data%' OR estatus_v.estatus LIKE '%$data%')"; 
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[0]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td>".$data[5]."</td>
    <td>".$data[6]."</td>
    <td><form action='chat.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[1]."'><button type='submit' class='btn btn-primary'>Mensaje</button></form></td>
    <td><form action='detalles_viaje_reptrans.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[7]."'><button type='submit' class='btn btn-success'>Configuraci&oacuten</button></form></td>
    ";
}


?>