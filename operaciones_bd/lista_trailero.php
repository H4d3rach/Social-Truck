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
$consulta ="SELECT usuario.id_usuario, usuario.nombre, usuario.telefono, usuario.especializacion, usuario.years_exp, estatus_u.estatus, sede.nombre 
FROM usuario, estatus_u, sede WHERE usuario.estatus_id = estatus_u.id_estatus AND usuario.sede_id = sede.id_sede AND usuario.empresa_razon='$empresa_razon' AND rol_id=3";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT usuario.id_usuario, usuario.nombre, usuario.telefono, usuario.especializacion, usuario.years_exp, estatus_u.estatus, sede.nombre 
    FROM usuario, estatus_u, sede WHERE usuario.estatus_id = estatus_u.id_estatus AND usuario.sede_id = sede.id_sede AND usuario.empresa_razon='$empresa_razon' AND rol_id=3
     and (usuario.id_usuario LIKE'%$data%' OR usuario.nombre LIKE '%$data%' OR usuario.telefono LIKE'%$data%' OR usuario.especializacion LIKE'%$data%' OR estatus_u.estatus LIKE'%$data%' 
    OR sede.nombre LIKE'%$data%')";
    $resultado = mysqli_query($conect,$consulta);
}
$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[0]."</td>
    <td>".$data[1]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]."</td>
    <td>".$data[2]."</td>
    <td>".$data[5]."</td>
    <td>".$data[6]."</td>
    <td><button type='button' class='btn btn-success' onClick=Editar('".$data[0]."')>Editar</button>
    <button type='button' class='btn btn-danger' onClick=Eliminar('".$data[0]."')>Eliminar</button></td>";
}


?>