<?php 
    include("conector.php");
    session_start();
    if (!isset($_SESSION['usuario']['rol'])) {
        header('location: login.php');
    } else { 
        if ($_SESSION['usuario']['rol'] != 3) {
            header('location: login.php');
        }
    }
    $id_usuario = $_SESSION['usuario']['id'];
    $select = "SELECT usuario.nombre, usuario.primer_apellido, usuario.segundo_apellido, empresa.razon_social FROM usuario, empresa WHERE usuario.empresa_razon = empresa.razon_social
    AND usuario.id_usuario='$id_usuario'";
    $resultado=mysqli_query($conect,$select);
    $row = $resultado->fetch_array();
    $nombre = $row['nombre'];
    $papellido = $row['primer_apellido'];
    $sapellido = $row['segundo_apellido'];
    $razon = $row['razon_social'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportista</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.scss" />
</head>
<body>
<main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 230px;">
    <div class="sticky-top">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img class="logo" src="imagenes/logo.png" alt="" width="45" height="35">
      <span class="fs-4">Social Truck</span>
    </a>
    <hr>
    <ul class="nav flex-column mb-auto">
      <li >
        <a href="transportista.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/home.png" alt="home">
          Home
        </a>
      </li>
      <li >
        <a href="viajes_trans.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/ruta.png" alt="Viajes">
          Viajes
        </a>
      </li>
      <li>
        <a href="transportistacontratos.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/contrato.png" alt="contratos">
          Contratos
        </a>
      </li>
      <li>
        <a href="estatus_trans.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/estatus.png" alt="estatus">
          Estatus
        </a>
      </li>
      <li>
                    <a href="chat.php" class="nav-link link-body-emphasis">
                        <img class="icono" src="imagenes/chat.png" alt="semirremolque">
                        Chat
                    </a>
                </li>
    </ul>
    <br>
    <br>
    <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
  </div>
  <div class="container">
<div class="row">
  <div class="col-lg-12 px-0">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
      <h1 class="display-4 fst-italic"><?php echo "$nombre $papellido $sapellido"?></h1>
      <p class="lead my-3">Transportista de <span class="text-body-emphasis fw-bold"><?php echo "$razon"?></span></p>
    </div>
  </div>
</div>

<div class="row mb-2">
  <div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <h3 class="mb-0">Informaci&oacuten</h3>
        <br>
        <?php 
            $select = "SELECT id_viaje FROM viaje WHERE transportista_id='$id_usuario' and viaje.estatus_id = 3";
            $resultado=mysqli_query($conect,$select);
            if($resultado && mysqli_num_rows($resultado)>0){
                $row = $resultado->fetch_array();
                $id_viaje=$row['id_viaje'];
                echo"<strong class='d-inline-block mb-2 text-primary-emphasis'>Estatus</strong>
                <p class='card-text mb-auto'>Tienes un viaje en progreso</p>
                <p class='card-text mb-auto'><a href='viajes_trans.php'>Ver</a></p>";
            }
            else{
                $select = "SELECT estatus_u.estatus from estatus_u,usuario WHERE estatus_u.id_estatus=usuario.estatus_id AND usuario.id_usuario='$id_usuario'";
                $resultado=mysqli_query($conect,$select);
                $row = $resultado->fetch_array();
                $estatus=$row['estatus'];
                echo"<strong class='d-inline-block mb-2 text-primary-emphasis'>Estatus</strong>
                <p class='card-text mb-auto'>Tu estatus es <b>$estatus</b></p>
                <p class='card-text mb-auto'><a href='estatus_trans.php'>Cambiar estatus</a></p>";
            }
        ?>
      </div>
      <div class="col-auto d-none d-lg-block">
        <svg class="bd-placeholder-img" width="100" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
      </div>
    </div>
  </div>
</div>
  </main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>