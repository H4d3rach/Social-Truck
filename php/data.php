<?php
echo"";
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = '{$row['id_usuario']}'
                OR outgoing_msg_id = '{$row['id_usuario']}') AND (outgoing_msg_id = '{$outgoing_id}' 
                OR incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conect, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No hay mensajes disponibles";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['outgoing_msg_id'])) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
    } else {
        $you = "";
    }
    ($outgoing_id == $row['id_usuario']) ? $hid_me = "hide" : $hid_me = "";

    echo"   <form action='chat.php' method='POST'>
                <input type='hidden' name='data' id='data' value='".$row['id_usuario']."' '>
                <div class='my-container'>
                <button style='background-color: white; border: none; color: black; width: 1200px' type='submit' >
                <div class='content'>
                    <img src='imagenes/defuser.png' style ='width:50px;height:50px'alt=''>
                    <div class='details'>
                        <span>" . $row['nombre'] . " " . $row['primer_apellido'] . "</span>
                        <p>'" . $you . $msg . "'</p>
                    </div>
                    </div>
                    </button>
                </div>
                </form>
                <br>";
}

