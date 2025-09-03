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

$consulta ="SELECT empresa.razon_social, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
, viaje.fecha_fin, viaje.precio,viaje.calificacion, viaje.id_viaje FROM empresa,usuario,viaje WHERE viaje.representante_cliente=usuario.id_usuario
 AND usuario.empresa_razon = empresa.razon_social AND viaje.representante_trans_id = '$id_user' AND (viaje.estatus_id=5 OR viaje.estatus_id=6)";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta = "SELECT SELECT empresa.razon_social, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
    , viaje.fecha_fin, viaje.precio,viaje.calificacion, viaje.id_viaje FROM empresa,usuario,viaje WHERE viaje.representante_cliente=usuario.id_usuario
     AND usuario.empresa_razon = empresa.razon_social AND viaje.representante_trans_id = '$id_user' AND (viaje.estatus_id=5 OR viaje.estatus_id=6)
    AND (empresa.razon_social LIKE '%$data%' OR viaje.lugar_recogida LIKE '%$data%' OR viaje.lugar_destino LIKE '%$data%' 
     OR viaje.descripcion LIKE '%$data%' OR viaje.fecha_fin LIKE '%$data%' OR viaje.precio LIKE '%$data%' OR viaje.calificacion LIKE '%$data%')"; 
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
    <td>".$data[5]."</td>
    <td>".$data[6]."</td>
    <td><form action='detalles_viaje_reptrans.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[7]."'><button type='submit' class='btn btn-success'>Detalles</button></form></td>
    ";
}


?>