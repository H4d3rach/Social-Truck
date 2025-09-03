<?php
    $host = "localhost";
    $nombre_usuario = "root";
    $contra = "1234";
    $db = "socialtruck";
    $conect = mysqli_connect($host, $nombre_usuario, $contra, $db);
    if (mysqli_connect_errno()){
        echo "El sitio web está experimentando fallos...";
        exit();
    }else{
       
    }
?>