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
    if(isset($_POST)){
        $no_serie = $_POST['no_serie'];
        $capacidad = $_POST['capacidad'];
        $dimensiones = $_POST['dimensiones'];
        $extra = $_POST['extra'];
        $sede_id = $_POST['sede'];
        $tipo_id = $_POST['tipo'];
        $estatus_id = $_POST['estatus'];

        if(empty($_POST['ids'])){
        /*$consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
        $resultado = mysqli_query($conect,$consulta);
        if($row = $resultado->fetch_array()){
            $empresa_razon = $row['empresa_razon'];
            $insert = "INSERT INTO sede(nombre, direccion,empresa_rs) VALUES ('$nombre','$direccion','$empresa_razon')";
            $query = mysqli_query($conect,$insert);
            }*/
            $insert = "INSERT INTO semirremolque VALUES ($no_serie,$capacidad,'$dimensiones','$extra',$sede_id,$tipo_id,$estatus_id)";
            $query = mysqli_query($conect,$insert);
        }
        else{
            $id = $_POST['ids'];
            $update ="UPDATE semirremolque SET capacidad=$capacidad, dimensiones = '$dimensiones', extras='$extra', 
            sede_id=$sede_id, tipo_id=$tipo_id, estatus_id = $estatus_id WHERE no_serie=$id";
            $resultado = mysqli_query($conect,$update);
        }
            }
?>