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
      <li >
        <a href="representante_trans.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="imagenes/home.png" alt="home">
          Home
        </a>
      </li>
      <li >
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
  <div class="b-example-divider b-example-vr"></div>
    <div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Registro y Busqueda</h3>
  </div>
                <div class="card-body">
                    <form action="" method="post" id="frm" class="needs-validation" novalidate>
                    <label for="nombre_sede" class="form-label">Nombre de sede</label>
                    <input type="hidden" name="ids" id="ids" value="">
                    <input type="text" class="form-control" name="nombre_sede" id="nombre_sede" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    Es necesario que ingrese un nombre.
                    </div>
                    <label for="direccion_sede" class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion_sede" id="direccion_sede" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    Es necesario que ingrese un nombre.
                    </div>
                    <hr class="my-4">
                    <input type="button" value="Registrar" name="registrar" id="registrar" class="w-100 btn btn-primary btn-lg" >
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar">Busqueda</label>
                  <input type="text" name="buscar" id="buscar" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
          </div>
        <h4>Mis Sedes</h4>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Opciones</th>
                </thead>
                <tbody id="sede_result">
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<script src="js/scrpt_sede.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>