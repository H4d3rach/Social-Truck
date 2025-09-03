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
    <div class="sticky-top">
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
  </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Postulaciones a mis trabajos</h3>
</div>
            <div class="card-body">
                <?php
                $id_user = $_SESSION['usuario']['id'];
                $select = "SELECT id_viaje,lugar_recogida, lugar_destino, descripcion, fecha_inicio, fecha_fin FROM viaje,usuario,empresa
                WHERE viaje.representante_cliente = usuario.id_usuario AND usuario.empresa_razon = empresa.razon_social AND viaje.estatus_id=1";
                $resultado = mysqli_query($conect,$select);
                $row = $resultado->fetch_all();
                $controlador = 1;
                foreach($row as $data){
                $id_viaje = $data['0'];
                $recogida = $data['1'];
                $destino = $data['2'];
                $descripcion = $data['3'];
                $inic = $data['4'];
                $fin = $data['5'];
                echo"
    <div class='accordion accordion-flush mt-4' id='accordionFlushExample'>
  <div class='accordion-item'>
    <h2 class='accordion-header'>
      <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse$controlador' aria-expanded='false' aria-controls='flush-collapse$controlador'>
        <div class='row'>
            <div class='col-md-4 mb-2'><label><b>Recogida:</b> $recogida</label></div>
            <div class='col-md-4 mb-2'><label><b>Destino:</b> $destino</label></div>
            <div class='col-md-4 mb-2'><label><b>Inicio:</b> $inic</label></div>
            <div class='col-md-4 mb-2'><label><b>Fin:</b> $fin</label></div>
            <div class='col-md-8 mb-2'><label><b>Descripci&oacuten</b> $descripcion</label></div>
</div>
      </button>
    </h2>
    <div id='flush-collapse$controlador' class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
      <div class='accordion-body'>
      <h4 class='text-center'>Postulantes</h4>
      <table class='table table-hover table-responsive'>
          <thead>
              <th>Nombre</th>
              <th>Primer Apellido</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Empresa</th>
              <th>Postulaci&oacuten</th>
              <th>Chat</th>
              <th>Opciones</th>
          </thead>
          <tbody>";
          $consulta = "SELECT postulacion.viaje_id,postulacion.postulacion, usuario.id_usuario, usuario.nombre, usuario.primer_apellido, usuario.correo, usuario.telefono,
          empresa.razon_social FROM postulacion,usuario,empresa WHERE postulacion.usuario_id = usuario.id_usuario AND usuario.empresa_razon = empresa.razon_social AND postulacion.viaje_id = $id_viaje";
          $resultado = mysqli_query($conect,$consulta);
          $row1 = $resultado->fetch_all();
            foreach($row1 as $data2){
                echo"<tr>
                    <td>".$data2[3]."</td>
                    <td>".$data2[4]."</td>
                    <td>".$data2[5]."</td>
                    <td>".$data2[6]."</td>
                    <td>".$data2[7]."</td>
                    <td>".$data2[1]."</td>
                    <td><form action='chat.php' method='POST'><input type='hidden' name='data' id='data' value='".$data2[2]."'><button type='submit' class='btn btn-success'>Mensaje</button></form></td>
                    <td><form action='verperfil_client.php' method='POST'><input type='hidden' name='data' id='data' value='".$data2[2]."'><button type='submit' class='btn btn-success'>Ver Perfil</button></form>
                    <form action='operaciones_bd/contratar_empresa.php' method='POST'><input type='hidden' name='data' id='data' value='".$data2[0]."'><input type='hidden' name='data2' id='data2' value='".$data2[2]."'><button type='submit' class='btn btn-danger'>Contratar</button></form></td></tr>";
            }
            echo"
          </tbody>
      </table>
      </div>
    </div>
  </div>";
  $controlador=$controlador+1;
        }
  ?>
 
</div>
</div>
</div>
</main>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>