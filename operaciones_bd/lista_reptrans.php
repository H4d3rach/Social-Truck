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
$consulta ="SELECT usuario.id_usuario, usuario.nombre, usuario.primer_apellido, usuario.segundo_apellido, usuario.correo ,usuario.telefono 
FROM usuario WHERE usuario.empresa_razon='$empresa_razon' AND usuario.rol_id=1 AND NOT usuario.id_usuario='$id_user'";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT usuario.id_usuario, usuario.nombre, usuario.primer_apellido, usuario.segundo_apellido, usuario.correo ,usuario.telefono 
    FROM usuario WHERE usuario.empresa_razon='$empresa_razon' and (usuario.id_usuario LIKE'%$data%' OR usuario.nombre LIKE '%$data%' OR
    usuario.primer_apellido LIKE'%$data%' OR usuario.segundo_apellido LIKE'%$data%' OR usuario.correo LIKE'%$data%' OR usuario.telefono LIKE'%$data%' 
    AND usuario.rol_id=1 AND NOT usuario.id_usuario='$id_user')";
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
    <td><button type='button' class='btn btn-success' onClick=Editar('".$data[0]."')>Mensaje</button>";
}


?>