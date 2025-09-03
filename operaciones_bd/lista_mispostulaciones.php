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

$consulta ="SELECT postulacion.postulacion_id, empresa.razon_social, usuario.id_usuario,usuario.nombre, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
, viaje.fecha_inicio, viaje.fecha_fin FROM postulacion,empresa,usuario,viaje WHERE postulacion.viaje_id=viaje.id_viaje AND viaje.representante_cliente=usuario.id_usuario
 AND usuario.empresa_razon = empresa.razon_social AND postulacion.usuario_id='$id_user' AND postulacion.estatus='no'";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta = "SELECT postulacion.postulacion_id, empresa.razon_social, usuario.id_usuario, usuario.nombre, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion
    , viaje.fecha_inicio, viaje.fecha_fin FROM postulacion,empresa,usuario,viaje WHERE postulacion.viaje_id=viaje.id_viaje AND viaje.representante_cliente=usuario.id_usuario
     AND usuario.empresa_razon = empresa.razon_social AND postulacion.usuario_id='$id_user' AND postulacion.estatus='no' 
     AND (empresa.razon_social LIKE '%$data%' OR usuario.nombre LIKE '%$data%' OR viaje.lugar_recogida LIKE '%$data%' OR viaje.lugar_destino LIKE '%$data%'
     OR viaje.descripcion LIKE '%$data%' OR viaje.fecha_inicio LIKE '%$data%' OR viaje.fecha_fin LIKE '%$data%')"; 
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[1]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td>".$data[5]."</td>
    <td>".$data[6]."</td>
    <td>".$data[7]."</td>
    <td>".$data[8]."</td>
    <td><form action='chat.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[2]."'><button type='submit' class='btn btn-primary'>Mensaje</button></form></td>
    ";
}


?>