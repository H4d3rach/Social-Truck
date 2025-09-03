<?php
include ("../conector.php");

    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=4){
            header('location: login.php');
        }
    }
    
    if (isset($_POST['data'])) {
        
        $razon = $_POST['data'];
        //echo"Esto es Data: $razon";
        $select ="SELECT * FROM empresa where razon_social ='$razon'"; 
        $resultado = mysqli_query($conect,$select);
        $row = $resultado->fetch_array();   
        $nombre = $row['nombre_comercial'];
        $rfc = $row['rfc'];
        $dirfis = $row['dirección_fiscal'];
        $web = $row['url_página_Web'];
        $rs = $row['url_red_social'];
        $of_prin = $row['dir_oficinas_principales'];
        $especializacion = $row['especialización'];
        $certificaciones = $row['certificaciones'];
                }
    if(isset($_POST['actualizar'])){
        $razonn = $_POST['razon'];
        $nombre = $_POST['nombre'];
        $rfc = $_POST['rfc'];
        $dirfis = $_POST['dirfis'];
        $web = $_POST['web'];
        $rs = $_POST['red'];
        $of_prin = $_POST['ofprin'];
        $especializacion = $_POST['especializacion'];
        $certificaciones = $_POST['certificaciones'];
        $update ="UPDATE empresa SET razon_social='$razonn',nombre_comercial='$nombre',rfc='$rfc',dirección_fiscal='$dirfis',url_página_Web='$web',
        url_red_social='$rs',dir_oficinas_principales='$of_prin',especialización='$especializacion', certificaciones='$certificaciones' 
        WHERE razon_social='$razonn'";
        $resultado = mysqli_query($conect,$update); 
        //echo"$update";
        header('location: ../gestion_Adminempresas.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporte Representante</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/styles.scss" />
</head>
<body>
<main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px;">
    <div class="sticky-top">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img class="logo" src="../imagenes/logo.png" alt="" width="45" height="35">
      <span class="fs-4">Social Truck</span>
    </a>
    <hr>
    <ul class="nav flex-column mb-auto">
      <li >
        <a href="../administrador.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="../imagenes/validacion.png" alt="home">
          Validaci&oacuten de cuentas
        </a>
      </li>
      <li >
        <a href="../gestion_Admintravel.php" class="nav-link link-body-emphasis" aria-current="page">
          <img class="icono" src="../imagenes/travel.png" alt="sede">
          Viajes
        </a>
      </li>
      <li>
        <a href="../gestion_Adminempresas.php" class="nav-link link-body-emphasis">
        <img class="icono" src="../imagenes/companies.png" alt="viajes">
          Empresas
        </a>
      </li>
      <li>
        <a href="../gestion_AdminPerfiles.php" class="nav-link link-body-emphasis">
        <img class="icono" src="../imagenes/users.png" alt="camion">
          Usuarios
        </a>
      </li>
      <li>
        <a href="../chat.php" class="nav-link link-body-emphasis">
        <img class="icono" src="../imagenes/chat.png" alt="semirremolque">
          Chat
        </a>
      </li>
      
    </ul>
    <br>
    <br>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>Perfil</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="../editarperfil_reptrans.php">Editar</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="../login.php?cerrar_sesion">Cerrar Sesion</a></li>
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
                <h3 class="center">Informaci&oacuten de la empresa</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="razon" class="form-label">Raz&oacuten Social:</label>
                        <input type="text" class="form-control" name="razon" id="razon" placeholder="" value="<?php echo"$razon"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="nombre" class="form-label">Nombre Comercial:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?php echo"$nombre"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="rfc" class="form-label">RFC:</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" placeholder="" value="<?php echo"$rfc"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="dirfis" class="form-label">Direcci&oacuten Fiscal:</label>
                        <input type="text" class="form-control" name="dirfis" id="dirfis" placeholder="" value="<?php echo"$dirfis"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="web" class="form-label">Pagina Web:</label>
                        <input type="text" class="form-control" name="web" id="web" placeholder="" value="<?php echo"$web"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="red" class="form-label">Red Social: </label>
                        <input type="text" class="form-control" name="red" id="red" placeholder="" value="<?php echo"$rs"?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="ofprin" class="form-label">Direcci&oacuten Oficinas Principales:</label>
                        <input type="text" class="form-control" name="ofprin" id="ofprin" placeholder="" value="<?php echo"$of_prin"?>">
                    </div>
                </div>
                <?php if(empty($especializacion)){
                      echo"<input type='hidden' name='especializacion' id='especializacion' placeholder='' value='".$especializacion."'>
                          <input type='hidden' name='certificaciones' id='certificaciones' placeholder='' value='".$certificaciones."'>
                      </div>
                        <hr class='my-4'>
                            <input type='submit' value='Actualizar' name='actualizar' id='actualizar' class='w-25 btn btn-primary btn-lg' >
                        </form>";
                }else{
                    echo"
                <div class='row'>
                    <div class='col-md-12 mb-2'>
                        <label for='especializacion' class='form-label'>Especializaci&oacuten:</label>
                        <input type='text' class='form-control' name='especializacion' id='especializacion' placeholder='' value='$especializacion'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12 mb-2'>
                        <label for='certificaciones' class='form-label'>Certificaciones</label>
                        <input type='text' class='form-control' name='certificaciones' id='certificaciones' placeholder='' value='$certificaciones'>
                    </div>
                </div>
                </div>
                <hr class='my-4'>
                    <input type='submit' value='Actualizar' name='actualizar' id='actualizar' class='w-25 btn btn-primary btn-lg' >
                </form>";}
                ?>
                
            </div>
        </div>
    </div>
</div>
</main>
<script src="../js/script_validacion.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>