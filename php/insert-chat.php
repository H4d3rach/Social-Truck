<?php 
    session_start();
    if(isset($_SESSION['usuario']['id'])){

        include_once "../conector.php";
        
        $outgoing_id = $_SESSION['usuario']['id'];
        $incoming_id = mysqli_real_escape_string($conect, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conect, $_POST['message']);
        if(!empty($message)){
            $insert = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
            VALUES ('$incoming_id', '$outgoing_id', '$message')";
            echo"$insert";
            $sql = mysqli_query($conect, $insert);
    if($sql){
        echo"Mensaje enviado";
    }
    else{
        error_log("Error al insertar el mensaje en la base de datos"); // Imprime un mensaje de error en el registro de errores del servidor

        echo"Mensaje no enviado";
    }
}
    }else{
        header("location: ../login.php");
    }


    
?>