<?php
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=4){
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
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px;">
    <div class="sticky-top">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img class="logo" src="imagenes/logo.png" alt="" width="45" height="35">
      <span class="fs-4">Social Truck</span>
    </a>
    <hr>
    <ul class="nav flex-column mb-auto">
      <li >
        <a href="administrador.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/validacion.png" alt="home">
          Validaci&oacuten de cuentas
        </a>
      </li>
      <li >
        <a href="gestion_Admintravel.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/travel.png" alt="sede">
          Viajes
        </a>
      </li>
      <li>
        <a href="gestion_Adminempresas.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/companies.png" alt="viajes">
          Empresas
        </a>
      </li>
      <li>
        <a href="gestion_AdminPerfiles.php" class="nav-link link-body-emphasis">
        <img class="icono" src="imagenes/users.png" alt="camion">
          Usuarios
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
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="editarperfil_admin.php">Editar</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
</div>
</div>
<div class="b-example-divider b-example-vr"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h3 class="center">Validaci&oacuten de cuentas</h3>
                </div>
                <div class="card-body">
                <table class="table table-hover table-responsive">
                    <thead>
                        <th>Empresa</th>
                        <th>RFC</th>
                        <th>Direcci&oacuten</th>
                        <th>RFC Representante</th>
                        <th>Representante</t>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="validacion_result">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script src="js/script_validacion.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>