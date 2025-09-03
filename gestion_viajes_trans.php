<?php
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=1){
            header('location: login.php');
        }
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
        <li>
          <a href="representante_trans.php" class="nav-link link-body-emphasis" aria-current="page">
            <img class="icono" src="imagenes/home.png" alt="home">
            Home
          </a>
        </li>
        <li>
          <a href="gestion_sede.php" class="nav-link link-body-emphasis" aria-current="page">
            <img class="icono" src="imagenes/garaje.png" alt="sede">
            Sedes
          </a>
        </li>
        <li>
          <a href="gestion_viajes_trans.php" class="nav-link link-body-emphasis">
            <img class="icono" src="imagenes/ruta.png" alt="viajes">
            Viajes
          </a>
        </li>
      <li>
        <a href="gestioncontratos.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/contrato.png" alt="contratos">
          Contratos
        </a>
      </li>
        <li>
          <a href="gestion_camiones.php" class="nav-link link-body-emphasis">
            <img class="icono" src="imagenes/camion.png" alt="camion">
            Camiones
          </a>
        </li>
        <li>
          <a href="gestion_semi.php" class="nav-link link-body-emphasis">
            <img class="icono" src="imagenes/trailer.png" alt="semirremolque">
            Semirremolques
          </a>
        </li>
        <li>
          <a href="gestion_transportistas.php" class="nav-link link-body-emphasis">
            <img class="icono" src="imagenes/gorra.png" alt="transportistas">
            Transportistas
          </a>
        </li>
        <li>
          <a href="gestion_reptrans.php" class="nav-link link-body-emphasis">
            <img class="icono" src="imagenes/administrador.png" alt="Representantes">
            Representantes
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
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
          <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>Perfil</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="editarperfil_reptrans.php">Editar</a></li>
          <li><a class="dropdown-item" href="verperfil_reptrans.php">Ver Perfil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Aquí se agrega el div de cierre -->
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Viajes</h3>
  </div>
  <div class="card-body">
  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <b>Mis Postulaciones</b>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar1">Busqueda</label>
                  <input type="text" name="buscar1" id="buscar1" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
        
  </div>
      <table class='table table-hover table-responsive td-2'>
          <thead>
          <th>Empresa</th>
              <th>Representante</th>
              <th>Recogida</th>
              <th>Destino</th>
              <th>Descripci&oacuten</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Mensaje</th>
          </thead>
          <tbody id="lista_mispostulaciones">
  </tbody>
  </table>
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <b>Trabajos Actuales</b>
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar2">Busqueda</label>
                  <input type="text" name="buscar2" id="buscar2" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
          </div>
      <table class='table table-hover table-responsive td-2'>
          <thead>
          <th>Empresa</th>
              <th>Recogida</th>
              <th>Destino</th>
              <th>Descripci&oacuten</th>
              <th>Fecha Inicio</th>
              <th>Estatus</th>
              <th>Mensaje</th>
              <th>Opciones</th>
          </thead>
          <tbody id="lista_mistrabajos_actuales">
  </tbody>
  </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        <b>Viajes Completados</b>
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar3">Busqueda</label>
                  <input type="text" name="buscar3" id="buscar3" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
          </div>
      <table class='table table-hover table-responsive td-2'>
          <thead>
          <th>Empresa</th>
              <th>Recogida</th>
              <th>Destino</th>
              <th>Descripci&oacuten</th>
              <th>Fecha Fin</th>
              <th>Costo</th>
              <th>Calificaci&oacuten</th>
              <th>Opciones</th>
          </thead>
          <tbody id="lista_historial">
  </tbody>
  </table>
      </div>
    </div>
  </div>
</div>
  </div>
  </div>
  </div>
</main>
<script src="js/gestion_viajes_trans.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>