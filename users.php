<?php
session_start();
include_once "conector.php";
if(!isset($_SESSION['usuario']['rol'])){
  header('location: login.php');
}
?>
<head>
<link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conect, "SELECT * FROM usuario WHERE id_usuario= '{$_SESSION['usuario']['id']}'");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="imagenes/defuser.png" alt="">
          <div class="details">
            <span><?php echo $row['nombre'] . " " . $row['primer_apellido'] ?></span>
            <p><?php echo $row['telefono']; ?></p>
          </div>
        </div>
        <div class="content">
            <a href="login.php">Volver</a>
        </div>
      </header>
      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="js/users.js"></script>

</body>

</html>