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
    $id = $_SESSION['usuario']['id'];
    $consultaViajesAct = "SELECT id_viaje, lugar_recogida, lugar_destino, descripcion,fecha_inicio, fecha_fin FROM viaje WHERE transportista_id = '$id' AND (estatus_id = 3 OR estatus_id = 4)";
    $resultadoViajesAct = mysqli_query($conect, $consultaViajesAct);
    if ($resultadoViajesAct) {
        if (mysqli_num_rows($resultadoViajesAct) > 0) {
            $viajes1 = array();
            while ($row = mysqli_fetch_assoc($resultadoViajesAct)) {
                $viajes1[] = $row;
            }
        } 
    }
    $consultaViajes = "SELECT id_viaje, lugar_recogida, lugar_destino, descripcion, fecha_inicio, fecha_fin, calificacion FROM viaje WHERE transportista_id = '$id' AND (estatus_id = 5 OR estatus_id = 6)";
    $resultadoViajes = mysqli_query($conect, $consultaViajes);
    if ($resultadoViajes) {
        if (mysqli_num_rows($resultadoViajes) > 0) {
            $viajes = array();
            while ($row = mysqli_fetch_assoc($resultadoViajes)) {
                $viajes[] = $row;
            }
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
        <div class="col-lg-12 mt-4">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Viaje actual</h3>
              </div>
                <div class="card-body">
                
                <table class="table table-hover table-responsive">
                <thead>
                    <th>ID del viaje</th>
                    <th>Lugar de recogida</th>
                    <th>Lugar de entrega</th>
                    <th>Descripción</th>
                    <th>Fecha de incio</th>
                    <th>Fecha de entrega</th>
                    <th>Monitoreo</th>
                </thead>
                <?php if (!empty($viajes1)): ?>
                <?php foreach ($viajes1 as $viaje): ?>
                <tr>
                <td><?php echo $viaje["id_viaje"]; ?></td>
                <td><?php echo $viaje["lugar_recogida"]; ?></td>
                <td><?php echo $viaje["lugar_destino"]; ?></td>
                <td><?php echo $viaje["descripcion"]; ?></td>
                <td><?php echo $viaje["fecha_inicio"]; ?></td>
                <td><?php echo $viaje["fecha_fin"]; ?></td>
                <?php
                echo"
                <td><form action='detalles_viajetrans.php' method='POST'><input type='hidden' name='data' id='data' value='".$viaje['id_viaje']."'><button type='submit' class='btn btn-success'>Monitorear</button></form></td>
                ";
                ?>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            
                </div>
            </div>
        </div>
        </div>
        <div class = "row">
        <div class="col-lg-12">
          <div class="row justify-content-start">
            <div class="col-lg-4 text-left">
            <!--<form action="" method="post">
                <div class="form-group">
                  <label for="buscar" class="form-laberl">Busqueda</label>
                  <input type="text" name="buscar" id="buscar" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>-->
            </div>
          </div>
        <br>
        <div class="card">
              <div class="card-header">
        <div>
                <h3 class="center">Historial de Viajes</h3>
              </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>ID del viaje</th>
                    <th>Lugar de recogida</th>
                    <th>Lugar de entrega</th>
                    <th>Descripción</th>
                    <th>Fecha de incio</th>
                    <th>Fecha de entrega</th>
                    <th>Calificación</th>
                </thead>
                <?php if (!empty($viajes)): ?>
                <?php foreach ($viajes as $viaje): ?>
                <tr>
                <td><?php echo $viaje["id_viaje"]; ?></td>
                <td><?php echo $viaje["lugar_recogida"]; ?></td>
                <td><?php echo $viaje["lugar_destino"]; ?></td>
                <td><?php echo $viaje["descripcion"]; ?></td>
                <td><?php echo $viaje["fecha_inicio"]; ?></td>
                <td><?php echo $viaje["fecha_fin"]; ?></td>
                <td><?php echo $viaje["calificacion"]; ?></td>
                </tr>
                <?php endforeach; ?>
                <tbody id="viajes_res">
                </tbody>
            </table>
            <?php endif; ?>
        </div>
        </div>
          </div>
  </div>
</div>
  </main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
