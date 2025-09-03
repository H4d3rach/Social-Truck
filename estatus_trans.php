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
    $id_user = $_SESSION['usuario']['id'];
    $estatusA = "SELECT estatus FROM estatus_u,usuario WHERE usuario.estatus_id=estatus_u.id_estatus AND usuario.id_usuario = '$id_user'";
    $resultadoA = mysqli_query($conect, $estatusA);
    if ($resultadoA) {
        if ($resultadoA->num_rows > 0) {
            $row = $resultadoA->fetch_assoc();
            $estatusAct = $row["estatus"];
        }
    }
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
  <div class="b-example-divider b-example-vr"></div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Estatus Actual</h3>
              </div>
                <div class="card-body">
                <strong class="d-inline-block mb-2 text-primary-emphasis"><?php echo"$estatusAct"?></strong>
              </div>
            </div>
        </div>
    </div>
    <br>
    <div class="b-example-divider b-example-vr"></div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Actualizar Estatus</h3>
              </div>
              <div class="card-body">
                <form action="operaciones_bd/actualizar_estatustrans.php" method="POST" id="frm">
    
                            <labael for="estado_estatus">Estatus:</label>
                            <select name="estado_estatus" id="sel">
                            <option disabled>Selecciona una opcion</option>
                            <option value="3">Disponible en sede</option>
                            <option value="4">Disponible fuera de sede</option>
                            <option value="5">En viaje</option>
                            <option value="6">No disponible</option>
                            </select>
                            <br><br>
                            <input type="submit" value="Actualizar estatus" name="act" id="act" class="w-100 btn btn-primary btn-lg"  >
                        
                </form>
              </div>
            </div>
        </div>
    </div>

  </main>
  <script src="js/script_trans.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
