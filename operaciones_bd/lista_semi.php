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
$consulta ="SELECT semirremolque.no_serie,semirremolque.capacidad,semirremolque.dimensiones,semirremolque.extras,sede.nombre,
tipo_semirremolque.tipo,estatus_c_s.estatus FROM (semirremolque,sede,tipo_semirremolque,estatus_c_s) WHERE 
semirremolque.sede_id = sede.id_sede and semirremolque.tipo_id=tipo_semirremolque.id_tipo and semirremolque.estatus_id=estatus_c_s.id_estatus 
and sede.empresa_rs = '$empresa_razon'";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT semirremolque.no_serie,semirremolque.capacidad,semirremolque.dimensiones,semirremolque.extras,sede.nombre,
    tipo_semirremolque.tipo,estatus_c_s.estatus FROM (semirremolque,sede,tipo_semirremolque,estatus_c_s) WHERE 
    semirremolque.sede_id = sede.id_sede and semirremolque.tipo_id=tipo_semirremolque.id_tipo and semirremolque.estatus_id=estatus_c_s.id_estatus 
    and sede.empresa_rs = '$empresa_razon' and (semirremolque.no_serie LIKE'%$data%' OR semirremolque.no_serie LIKE'%$data%' OR semirremolque.capacidad LIKE'%$data%' OR semirremolque.dimensiones LIKE'%$data%' 
    OR semirremolque.extras LIKE'%$data%' OR sede.nombre LIKE'%$data%' OR tipo_semirremolque.tipo LIKE'%$data%' OR estatus_c_s.estatus LIKE'%$data%')";
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
    <td><button type='button' class='btn btn-success' onClick=Editar('".$data[0]."')>Editar</button>
    <button type='button' class='btn btn-danger' onClick=Eliminar('".$data[0]."')>Eliminar</button></td>";
}


?>