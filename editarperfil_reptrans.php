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
    $id_user = $_SESSION['usuario']['id'];
    $select ="SELECT id_usuario,nombre,primer_apellido,segundo_apellido,correo,contra,telefono FROM usuario where id_usuario ='$id_user'"; 
    $resultado = mysqli_query($conect,$select);
    $row = $resultado->fetch_array();
    $nombre = $row['nombre'];
    $primer_apellido = $row['primer_apellido'];
    $segundo_apellido = $row['segundo_apellido'];
    $correo = $row['correo'];
    $contra = $row['contra'];
    $telefono = $row['telefono'];
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
  <form action="" method="post" id="frm" class="needs-validation" novalidate>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Informaci&oacuten Personal</h3>
              </div>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-12 mb-2">
                    <label for="id_usuario" class="form-label" >RFC</label>
                    <input type="hidden" name="ids" id="ids" value="<?php echo"$id_user"?>">
                    <input type="text" class="form-control" name="id_usuario" id="id_usuario" placeholder="" value="<?php echo"$id_user"?>" required>
                    <div class="invalid-feedback">
                    Es necesario que ingrese un nombre.
                    </div>
  </div>
</div>
                    <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?php echo"$nombre"?>">
</div>
</div>
            
                    <div class="col-md-12 mb-2">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" placeholder="" value="<?php echo"$primer_apellido"?>">
  </div>
                    <div class="col-md-12 mb-2">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" placeholder="" value="<?php echo"$segundo_apellido"?>">
  </div>
                    <div class="col-md-12 mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" value="<?php echo"$telefono"?>">
  </div>
</div>
</div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
        <h3 class="center">Cuenta</h3>
        </div>
        <div class="card-body">
        <div class="col-md-12 mb-2">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo" id="correo" placeholder="" value="<?php echo"$correo"?>">
        </div>
        <div class="col-md-12 mb-2">
                    <label for="pass" class="form-label">Contrase&ntildea</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="" value="<?php echo"$contra"?>">
        </div>
        <hr class="my-4">
        <input type="button" value="Actualizar perfil" name="registrar" id="registrar" class="w-100 btn btn-primary btn-lg" >
        <?php
        echo"<br><br>
        <Button type='button' class='w-100 btn btn-danger btn-lg' onClick=Eliminar('".$id_user."') >Eliminar perfil</Button>";
        ?>
        </div>
    </div>
</div>
</div>
</form>
</div>
</main>
<script src="js/scrpt_reptrans.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>           