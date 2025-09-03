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
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $correo = $_POST['correo'];
        $contra = $_POST['pass'];
        $telefono = $_POST['telefono'];
        $especializacion = $_POST['especializacion'];
        $year_exp = $_POST['years'];
        $rol_id= 3;
        $estatus_id= $_POST['estatus'];
        $sede_id= $_POST['sede'];

        if(empty($_POST['ids'])){
            $id_user = $_SESSION['usuario']['id'];
            $consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
            $resultado = mysqli_query($conect,$consulta);
            $row1 = $resultado->fetch_array();
            $empresa_razon = $row1['empresa_razon'];
            $insert = "INSERT INTO usuario(id_usuario,nombre,primer_apellido,segundo_apellido,correo,contra,telefono, especializacion, years_exp,
            rol_id, estatus_id,empresa_razon,sede_id) VALUES ('$id_usuario','$nombre','$primer_apellido','$segundo_apellido','$correo','$contra',
            '$telefono','$especializacion','$year_exp',$rol_id,$estatus_id,'$empresa_razon',$sede_id)";
            echo "$insert";
            $query = mysqli_query($conect,$insert);
        }
        
            }
?>