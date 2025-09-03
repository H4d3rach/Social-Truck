<?php
session_start();
include_once "conector.php";
if(!isset($_SESSION['usuario']['rol'])){
  header('location: login.php');
}
$user_id='';
if(isset($_POST['data'])){
    $user_id=$_POST['data'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporte Representante</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.scss" />
    <link rel="stylesheet" href="./style.css">

</head>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        //$user_id = mysqli_real_escape_string($conect, $_GET['user_id']);
        $sql = mysqli_query($conect, "SELECT * FROM usuario WHERE id_usuario = '{$user_id}'");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
          echo"entre al else";
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="imagenes/defuser.png" alt="">
        <div class="details">
          <span><?php echo $row['nombre'] . " " . $row['primer_apellido'] ?></span>
          <p><?php echo $row['telefono']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
        <button>Enviar</i></button>
      </form>
    </section>
  </div>
  <script src="js/chat.js"></script>

</body>

</html>