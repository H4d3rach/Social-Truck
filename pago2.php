<?php
    include ("conector.php");
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=2){
            header('location: login.php');
        }
    }
    if(isset($_POST['data'])){
        $id_viaje = $_POST['data'];
        $_SESSION['id_viaje']=$id_viaje;
    }
    if(isset($_POST['calif'])){
        $calif = $_POST['calif'];
        $id_viaje = $_SESSION['id_viaje'];
        $UPDA = "UPDATE viaje SET calificacion = $calif, estatus_id = 6 WHERE id_viaje = $id_viaje";
        $up = mysqli_query($conect,$UPDA);
        header('location: gestion_viajesaceptados.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representante Cliente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.scss" />
</head>
<body>
<main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px;">
    <div class="sticky-top">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img class="logo" src="imagenes/logo.png" alt="" width="45" height="35">
      <span class="fs-4">Social Truck</span>
    </a>
    <hr>
    <ul class="nav flex-column mb-auto">
      <li >
        <a href="representante_client.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/nueva_carga.png" alt="home">
          Publicar Trabajo
        </a>
      </li>
      <li >
        <a href="gestion_postulaciones.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/postulacion.png" alt="sede">
          Postulaciones
        </a>
      </li>
      <li>
        <a href="gestion_viajesaceptados.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/aceptar_postulacion.png" alt="viajes">
          Viajes Aceptados
        </a>
      </li>
      <li>
        <a href="gestion_historialviajes.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/historial.png" alt="viajes">
          Historial Viajes
        </a>
      </li>
      <li>
        <a href="chat.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/chat.png" alt="semirremolque">
          Chat
        </a>
      </li>
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
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="editarperfil_reptrans.php">Editar</a></li>
        <li><a class="dropdown-item" href="verperfil_client.php">Ver Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
</div>
  </div>
    <div class="container">
    <div class='position-absolute top-50 start-50 translate-middle'>
        <div>
            <p>Operación realizada con éxito </p>
        </div>
    
    
        <div>
            <p> Le notificaremos cuando se confirme el pago.</p>    
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Calificaci&oacuten</h5>
            </div>
            <div class="card-body">
                <b>Ingrese una calificaci&oacuten del 0 a 10</b>
                <form action="#" method="post" id="frm" class="needs-validation" novalidate >
                  <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="calif" class="form-label">Calificaci&oacuten</label>
                    <input type="text" class="form-control" name="calif" id="calif" placeholder="" value="">
                </div>
                </div>
                <hr>
                <button type='submit' class='btn btn-primary'>Calificar</button>
</form>
            </div>
        </div>
    </div>
</main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>