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
$consulta ="SELECT id_usuario, nombre, primer_apellido, segundo_apellido, correo, telefono, rol
FROM usuario,rol WHERE usuario.rol_id = rol.id_rol AND NOT id_usuario='$id_user' ORDER BY rol_id";
$resultado = mysqli_query($conect,$consulta);
if($data != ""){
    $consulta ="SELECT id_usuario, nombre, primer_apellido, segundo_apellido, correo, telefono, rol FROM usuario,rol WHERE usuario.rol_id = rol.id_rol
    AND NOT id_usuario='$id_user' AND (id_usuario LIKE'%$data%' OR nombre LIKE'%$data%' OR primer_apellido LIKE'%$data%' OR segundo_apellido LIKE'%$data%' 
    OR correo LIKE'%$data%' OR telefono LIKE'%$data%' OR rol LIKE'%$data%') ORDER BY rol_id";
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
    <td><form action='chat.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-primary'>Mensaje</button></form>
    <form action='operaciones_bd/eliminar_usuario.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[0]."'><button type='submit' class='btn btn-danger'>Eliminar</button></form></td></td>";
}


?>