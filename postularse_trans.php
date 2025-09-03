<?php
include ("conector.php");
session_start();
if(!isset($_SESSION['usuario']['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['usuario']['rol']!=1){
        header('location: login.php');
    }
}
if(isset($_POST['postu'])){
    $id_viaje = $_POST['ids'];
    $id_user = $_SESSION['usuario']['id'];
    $postulacion = $_POST['postu'];
    $insert = "INSERT INTO postulacion(usuario_id,viaje_id,postulacion,estatus) VALUES ('$id_user',$id_viaje,'$postulacion','no')";
    $resultado = mysqli_query($conect,$insert);
    header('location: gestion_viajes_trans.php');
}
if(isset($_POST['data'])){
    $id_viaje = $_POST['data'];
    $consulta ="SELECT lugar_recogida,lugar_destino,descripcion,fecha_inicio,fecha_fin FROM viaje WHERE id_viaje = '$id_viaje'";
    $resultado = mysqli_query($conect,$consulta);
    $row1 = $resultado->fetch_array();
    $reco = $row1['lugar_recogida'];
    $dest = $row1['lugar_destino'];
    $desc = $row1['descripcion'];
    $fecinic = $row1['fecha_inicio'];
    $fecfin = $row1['fecha_fin'];
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
  <div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                <h3 class="center">Postularse a</h3>
                </div>
                <div class="card-body">
                  <form action="#" method="post" id="frm" class="needs-validation" novalidate >
                  <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="reco" class="form-label">Lugar Recogida</label>
                    <input type="hidden" name="ids" id="ids" value="<?php echo"$id_viaje";?>">
                    <input type="text" class="form-control" name="reco" id="reco" placeholder="" value="<?php echo"$reco"; ?>" readonly>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="dest" class="form-label">Lugar Destino</label>
                    <input type="text" class="form-control" name="dest" id="dest" placeholder="" value="<?php echo"$dest"; ?>" readonly>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="desc" class="form-label">Descripci&oacuten del Trabajo</label>
                    <textarea  class="form-control" name="desc" id="desc" placeholder="" value="" readonly><?php echo"$desc"; ?></textarea>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="inic_date" class="form-label">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="inic_date" id="inic_date" placeholder="" value="<?php echo"$fecinic"; ?>" readonly>
                </div>
                <div class="col-md-4 mb-2">
                    <label for="fin_date" class="form-label">Fecha de Finalizaci&oacuten</label>
                    <input type="date" class="form-control" name="fin_date" id="fin_date" placeholder="" value="<?php echo"$fecfin"; ?>" readonly>
                </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-2">
                    <label for="postu" class="form-label">Postulaci&oacuten</label>
                    <textarea  class="form-control" name="postu" id="postu" placeholder="" value=""></textarea>
</div>
</div>
                <hr>
                <input type="submit" value="Postularse" name="postularse" id="postularse" class="w-100 btn btn-primary btn-lg" >
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