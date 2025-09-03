<?php
include ("../conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['usuario']['rol']!=2){
        header('location: login.php');
    }
} 
$data = file_get_contents("php://input");
$id_user = $_SESSION['usuario']['id'];
$consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
$resultado = mysqli_query($conect,$consulta);
$row1 = $resultado->fetch_array();
$empresa_razon = $row1['empresa_razon'];

$consulta ="SELECT viaje.id_viaje,viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion, usuario.nombre, usuario.primer_apellido, 
empresa.razon_social, estatus_v.estatus FROM viaje,usuario,empresa,estatus_v WHERE viaje.representante_trans_id = usuario.id_usuario AND 
usuario.empresa_razon = empresa.razon_social AND viaje.estatus_id = estatus_v.id_estatus AND NOT viaje.estatus_id=1 AND NOT viaje.estatus_id=6  AND representante_cliente='$id_user' ORDER BY viaje.estatus_id";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT viaje.id_viaje,viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion, usuario.nombre, usuario.primer_apellido, 
    empresa.razon_social, estatus_v.estatus FROM viaje,usuario,empresa,estatus_v WHERE viaje.representante_trans_id = usuario.id_usuario AND 
    usuario.empresa_razon = empresa.razon_social AND viaje.estatus_id = estatus_v.id_estatus AND NOT viaje.estatus_id=1 AND NOT viaje.estatus_id=6 AND representante_cliente='$id_user'
     and (viaje.lugar_recogida LIKE'%$data%' OR  viaje.lugar_destino LIKE'%$data%' OR viaje.descripcion LIKE'%$data%' OR usuario.nombre LIKE '%$data%' 
    OR usuario.primer_apellido LIKE '%$data%' OR empresa.razon_social LIKE'%$data%' OR estatus_v.estatus LIKE'%$data%') ORDER BY viaje.estatus_id";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[6]."</td>
    <td>".$data[4]." ".$data[5]."</td>
    <td>".$data[7]."</td>
    <td><form action='detalles_viaje.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-success'>Detalles</button></form></td>";
}


?>