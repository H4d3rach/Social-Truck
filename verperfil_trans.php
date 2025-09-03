<?php
include ("conector.php");
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=4){
            header('location: login.php');
        }
    }
    if (isset($_POST['data'])) {
        $id_user = $_POST['data'];
 
    $consulta ="SELECT id_usuario, nombre, primer_apellido, segundo_apellido, correo ,telefono, empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
    $resultado = mysqli_query($conect,$consulta);
    $row1 = $resultado->fetch_array();
    $nombre = $row1['nombre'];
    $primer_apellido = $row1['primer_apellido'];
    $segundo_apellido = $row1['segundo_apellido'];
    $correo = $row1['correo'];
    $telefono = $row1['telefono'];
    $empresa_razon = $row1['empresa_razon'];
    $consulta = "SELECT * FROM empresa where razon_social='$empresa_razon'";
    $resultado = mysqli_query($conect,$consulta);
    $row2 = $resultado->fetch_array();
    $ncomercial = $row2['nombre_comercial'];
    $urlweb = $row2['url_pagina_Web'];
    $urlred = $row2['url_red_social'];
    $dir_ofprin = $row2['dir_oficinas_principales'];
    $especializacion = $row2['especialización'];
    $certificaciones = $row2['certificaciones'];
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
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="editarperfil_reptrans.php">Editar</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?cerrar_sesion">Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
      <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-12 px-0">
          <h1 class="display-4 fst-italic"><?php echo"$nombre"?></h1>
          <p class="lead my-3">Representante de <span class="text-body-emphasis fw-bold"><?php echo"$empresa_razon"?></span></p>
        </div>
      </div>
    
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">Datos Personales</h3>
            <br>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Nombre</strong>
              <p class="card-text mb-auto"><?php echo"$nombre"?></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Primer Apellido</strong>
              <p class="card-text mb-auto"><?php echo"$primer_apellido"?></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Segundo Apellido</strong>
              <p class="card-text mb-auto"><?php echo"$segundo_apellido"?></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Correo</strong>
              <p class="card-text mb-auto"><?php echo"$correo"?></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Telefono</strong>
              <p class="card-text mb-auto"><?php echo"$telefono"?></p>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="100" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">Datos de la Empresa</h3>
            <br>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Nombre Comercial</strong>
              <p class="card-text mb-auto"><?php echo"$ncomercial"?></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Nuestra pagina web</strong>
              <p class="card-text mb-auto"><a href="<?php echo"$urlweb"?>"><?php echo"$urlweb"?></a></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Nuestra red social</strong>
              <p class="card-text mb-auto"><a href="<?php echo"$urlred"?>"><?php echo"$urlred"?></a></p>
              <strong class="d-inline-block mb-2 text-primary-emphasis">Encuentranos en</strong>
              <p class="card-text mb-auto"><?php echo"$dir_ofprin"?></p>
                <?php
                if(empty($especializacion)){
                    
                }else{ 
                    echo "<strong class='d-inline-block mb-2 text-primary-emphasis'>Nos especializamos en</strong>";
                    echo "<p class='card-text mb-auto'>" . $especializacion . "</p>";
                    echo "<strong class='d-inline-block mb-2 text-primary-emphasis'>Nuestras certificaciones</strong>";
                    echo "<p class='card-text mb-auto'>" . $certificaciones . "</p>";}
    
            ?>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="100" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            </div>
          </div>
        </div>
      </div>
                </div>
    </main>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>