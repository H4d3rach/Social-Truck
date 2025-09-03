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
$consulta ="SELECT viaje.id_viaje, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion, viaje.fecha_inicio, viaje.fecha_fin, usuario.nombre,
usuario.primer_apellido, empresa.razon_social, usuario.id_usuario From viaje,usuario,empresa WHERE viaje.representante_cliente = usuario.id_usuario AND usuario.empresa_razon 
= empresa.razon_social AND viaje.estatus_id = 1";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT DISTINCT viaje.id_viaje, viaje.lugar_recogida, viaje.lugar_destino, viaje.descripcion, viaje.fecha_inicio, viaje.fecha_fin, usuario.nombre,
    usuario.primer_apellido, empresa.razon_social, usuario.id_usuario From viaje,usuario,empresa,postulacion WHERE viaje.representante_cliente = usuario.id_usuario AND usuario.empresa_razon 
    = empresa.razon_social AND viaje.estatus_id = 1 AND (viaje.lugar_recogida LIKE'%$data%'OR viaje.lugar_destino LIKE'%$data%' OR viaje.descripcion LIKE'%$data%' 
    OR viaje.fecha_inicio LIKE'%$data%' OR viaje.fecha_fin LIKE'%$data%' OR usuario.nombre LIKE '%$data%' OR usuario.primer_apellido LIKE'%$data%' 
    OR empresa.razon_social LIKE'%$data%')";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[8]."</td>
    <td>".$data[6]." ".$data[7]."</td>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td>".$data[5]."</td>
    <td><form action='chat.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[9]."'><button type='submit' class='btn btn-success'>Mensaje</button></form></td>
    <td><form action='verperfil_sincetrans.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[9]."'><button type='submit' class='btn btn-success'>Ver Perfil</button></form>
    <form action='postularse_trans.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-danger'>Postularse</button></form></td>";
}


?>