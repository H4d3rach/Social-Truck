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
$consulta ="SELECT camion.placa, camion.modelo, camion.transmision, camion.extras,motor.motor,marca.marca,tipo_camion.tipo, estatus_c_s.estatus,sede.nombre 
FROM camion,motor,marca,tipo_camion,estatus_c_s,sede WHERE camion.motor_id=motor.id_motor AND camion.marca_id = marca.id_marca 
AND camion.tipo_id = tipo_camion.id_tipo AND camion.estatus_id = estatus_c_s.id_estatus AND camion.sede_id = sede.id_sede 
AND sede.empresa_rs = '$empresa_razon'";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT camion.placa, camion.modelo, camion.transmision, camion.extras,motor.motor,marca.marca,tipo_camion.tipo, estatus_c_s.estatus,sede.nombre 
    FROM camion,motor,marca,tipo_camion,estatus_c_s,sede WHERE camion.motor_id=motor.id_motor AND camion.marca_id = marca.id_marca 
    AND camion.tipo_id = tipo_camion.id_tipo AND camion.estatus_id = estatus_c_s.id_estatus AND camion.sede_id = sede.id_sede 
    AND sede.empresa_rs = '$empresa_razon' and (camion.placa LIKE'%$data%' OR camion.modelo LIKE'%$data%' OR camion.transmision LIKE'%$data%' OR camion.extras LIKE'%$data%' 
    OR motor.motor LIKE'%$data%' OR marca.marca LIKE'%$data%' OR tipo_camion.tipo LIKE'%$data%' OR estatus_c_s.estatus LIKE'%$data%' OR sede.nombre LIKE'%$data%')";
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
    <td>".$data[7]."</td>
    <td>".$data[8]."</td>
    <td><button type='button' class='btn btn-success' onClick=Editar('".$data[0]."')>Editar</button>
    <button type='button' class='btn btn-danger' onClick=Eliminar('".$data[0]."')>Eliminar</button></td>";
}


?>