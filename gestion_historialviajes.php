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
      <li>
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
      <li><a class="dropdown-item" href="editarperfil_reptrans.php">Editar</a></li>
        <li><a class="dropdown-item" href="verperfil_cclient.php">Ver Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Historial de mis viajes</h3>
            </div>
            <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar">Busqueda</label>
                  <input type="text" name="buscar" id="buscar" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>Recogida</th>
                    <th>Destino</th>
                    <th>Descripci&oacuten</th>
                    <th>Precio</th>
                    <th>Calificaci&oacuten</th>
                    <th>Empresa</th>
                    <th>Opciones</th>
                </thead>
                <tbody id="alltravel_result">
                </tbody>
            </table>
 
          </div>
            </div>
</div>
</main>
<script src="js/script_historialviajes.js">
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>