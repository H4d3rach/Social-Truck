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
    if(isset($_POST['reco']) && isset($_POST['dest']) && isset($_POST['desc']) && isset($_POST['inic_date']) && isset($_POST['fin_date'])){
      $recogida_place = $_POST['reco'];
      $destino_place = $_POST['dest'];
      $descripcion = $_POST['desc'];
      $inic = $_POST['inic_date'];
      $fin = $_POST['fin_date'];
      $rep_client = $_SESSION['usuario']['id'];
      $insert = "INSERT INTO viaje(lugar_recogida, lugar_destino, descripcion, fecha_inicio, fecha_fin, estatus_id,representante_cliente) VALUES ('$recogida_place',
      '$destino_place','$descripcion','$inic','$fin',1,'$rep_client')";
      //echo"$insert";
      $query = mysqli_query($conect,$insert);
      header('location: gestion_postulaciones.php');
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
        <a href="clientecontratos.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/contrato.png" alt="contratos">
          Contratos
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
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="editarperfil_client.php">Editar</a></li>
        <li><a class="dropdown-item" href="verperfil_cclient.php">Ver Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                <h3 class="center">Publicar un nuevo trabajo</h3>
                </div>
                <div class="card-body">
                  <form action="" method="post" id="frm" class="needs-validation" novalidate >
                  <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="reco" class="form-label">Lugar Recogida</label>
                    <input type="text" class="form-control" name="reco" id="reco" placeholder="" value="">
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="dest" class="form-label">Lugar Destino</label>
                    <input type="text" class="form-control" name="dest" id="dest" placeholder="" value="">
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="desc" class="form-label">Descripci&oacuten del Trabajo</label>
                    <textarea  class="form-control" name="desc" id="desc" placeholder="" value=""></textarea>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="inic_date" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="inic_date" id="inic_date" placeholder="" value="">
                </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="fin_date" class="form-label">Fecha de Finalizaci&oacuten</label>
                    <input type="date" class="form-control" name="fin_date" id="fin_date" placeholder="" value="">
                </div>
                </div>
                <hr>
                <input type="submit" value="Publicar" name="publicar" id="publicar" class="w-100 btn btn-primary btn-lg" >
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>