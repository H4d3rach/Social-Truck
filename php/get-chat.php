<?php
include_once "../conector.php";
session_start();
if (isset($_SESSION['usuario']['id'])) {
    $outgoing_id = $_SESSION['usuario']['id'];
    $incoming_id = mysqli_real_escape_string($conect, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN usuario ON usuario.id_usuario = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')
                OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id";
    //echo"$sql";
    $query = mysqli_query($conect, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="imagenes/defuser.png" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
?>