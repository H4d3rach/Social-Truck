<?php
    session_start();
    include_once "../conector.php";
    $outgoing_id = $_SESSION['usuario']['id'];
    $rol = $_SESSION['usuario']['id'];
    if($rol == 1){
        $SELECT = "SELECT empresa_razon from usuario WHERE id_usuario='$outgoing_id'";
        $que = mysqli_query($conect,$SELECT);
        $ro = $que->fetch_array();
        $rzon = $ro['empresa_razon'];
    $sql = "SELECT u.id_usuario, u.nombre, u.primer_apellido FROM usuario u JOIN empresa e ON u.empresa_razon = e.razon_social WHERE (u.rol_id = 1 OR u.rol_id = 3 ) 
    AND u.empresa_razon = '$rzon' UNION SELECT id_usuario,nombre,primer_apellido FROM usuario WHERE rol_id = 4 ORDER BY rol_id ASC";
    $query = mysqli_query($conect, $sql);
} else if($rol == 2){
    $SELECT = "SELECT empresa_razon from usuario WHERE id_usuario='$outgoing_id'";
        $que = mysqli_query($conect,$SELECT);
        $ro = $que->fetch_array();
        $rzon = $ro['empresa_razon'];
    $sql = "SELECT u.id_usuario, u.nombre, u.primer_apellido FROM usuario u JOIN empresa e ON u.empresa_razon = e.razon_social WHERE u.rol_id = 2  
    AND u.empresa_razon = '$rzon' UNION SELECT id_usuario,nombre,primer_apellido FROM usuario WHERE rol_id = 4 ORDER BY rol_id ASC";
}   else if($rol == 3){
    $SELECT = "SELECT empresa_rs from sede,usuario WHERE sede.id_sede=usuario.sede_id AND usuario.id_usuario='$outgoing_id'";
        $que = mysqli_query($conect,$SELECT);
        $ro = $que->fetch_array();
        $rzon = $ro['empresa_rs'];
    $sql = "SELECT u.id_usuario, u.nombre, u.primer_apellido FROM usuario u JOIN empresa e ON u.empresa_razon = e.razon_social WHERE (u.rol_id = 1 OR u.rol_id = 3 ) 
    AND u.empresa_razon = '$rzon' UNION SELECT id_usuario,nombre,primer_apellido FROM usuario WHERE rol_id = 4 ORDER BY rol_id ASC";
} else{
    $sql = "SELECT * FROM usuario WHERE NOT id_usuario = '{$outgoing_id}' ORDER BY id_usuario DESC";
    $query = mysqli_query($conect, $sql);
}
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>