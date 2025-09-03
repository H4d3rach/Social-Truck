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
$consulta ="SELECT empresa.razon_social, empresa.rfc, empresa.dirección_fiscal, usuario.id_usuario, usuario.nombre, usuario.primer_apellido,
usuario.correo, usuario.telefono  FROM empresa,usuario WHERE usuario.empresa_razon=empresa.razon_social AND usuario.estatus_id=2";

$resultado = mysqli_query($conect,$consulta);

$row = $resultado->fetch_all();
foreach($row as $data){
    echo"<tr>
    <td>".$data[0]."</td>
    <td>".$data[1]."</td>
    <td>".$data[2]."</td>
    <td>".$data[3]."</td>
    <td>".$data[4]." ".$data[5]."</td>
    <td>".$data[6]."</td>
    <td>".$data[7]."</td>
    <td><form action='verperfil_trans.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[3]."'><button type='submit' class='btn btn-success'>Perfil</button></form>
    <form action='operaciones_bd/editar_validacion.php' method='POST'><input type='hidden' name='data' id='data' value='".$data[3]."'><button type='submit' class='btn btn-danger'>Validar</button></form></td>";
}



?>