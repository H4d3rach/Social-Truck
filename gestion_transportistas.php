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
    <div class="container custom_container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Registro y Busqueda</h3>
              </div>
                <div class="card-body">
                    <form action="" method="post" id="frm" class="needs-validation" novalidate>
                    <div class="card">
                    <div class="card-header">
                        <h4>Informaci&oacuten Personal</h4>
                    </div>
                      <div class="row">
                        <div class="col-md-2 mb-2">
                    <label for="id_usuario" class="form-label" >RFC</label>
                    <input type="hidden" name="ids" id="ids" value="">
                    <input type="text" class="form-control" name="id_usuario" id="id_usuario" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    Es necesario que ingrese un nombre.
                    </div>
  </div>
                  <div class="col-md-4 mb-2">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="">
  </div>
                    <div class="col-md-3 mb-2">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" placeholder="" value="">
  </div>
                    <div class="col-md-3 mb-2">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" placeholder="" value="">
  </div>
                    <div class="col-md-3 mb-2">
                                      <label for="correo" class="form-label">Correo</label>
                                      <input type="text" class="form-control" name="correo" id="correo" placeholder="" value="">
                    </div>
                    <div class="col-md-3 mb-2">
                                      <label for="pass" class="form-label">Contrase&ntildea</label>
                                      <input type="password" class="form-control" name="pass" id="pass" placeholder="" value="">
                    </div>
                    <div class="col-md-3 mb-2">
                                      <label for="telefono" class="form-label">Telefono</label>
                                      <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" value="">
                    </div>
  </div>            
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <h4>Experiencia Laboral</h4>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-2">
                                      <label for="especializacion" class="form-label">Especializaci&oacuten</label>
                                      <input type="text" class="form-control" name="especializacion" id="especializacion" placeholder="" value="">
                    </div>
                    <div class="col-md-3 mb-2">
                                      <label for="years" class="form-label">A&ntildeos de experiencia</label>
                                      <input type="text" class="form-control" name="years" id="years" placeholder="" value="">
                    </div>         
                    <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="estatus" >Estatus</label>
                        <select class="custom-select d-block w-100" name="estatus" id="estatus" >
                        <?php
                          include ("conector.php");
                          $consulta = "SELECT id_estatus,estatus FROM estatus_u WHERE id_estatus>2";
                          $query = mysqli_query($conect,$consulta);
                          $row = $query->fetch_all();
                          foreach($row as $data){
                            ?>
                            <option value="<?php print($data[0]) ?>"><?php print($data[1]) ?></option>
                            <?php
                        }
                        ?>
  </select>
  </div>
                      <div class="col-md-4 mb-2">
                        <label for="sede" >Sede</label>
                        <select class="custom-select d-block w-100" name="sede" id="sede" >
                        <?php
                          include ("conector.php");
                          $id_user = $_SESSION['usuario']['id'];
                          $consulta ="SELECT empresa_razon FROM usuario WHERE id_usuario = '$id_user'";
                          $resultado = mysqli_query($conect,$consulta);
                          $row = $resultado->fetch_array();
                          $empresa_razon = $row['empresa_razon'];
                          $consulta = "SELECT id_sede,nombre FROM sede WHERE empresa_rs = '$empresa_razon'";
                          $query = mysqli_query($conect,$consulta);
                          $row = $query->fetch_all();
                          foreach($row as $data){
                            ?>
                            <option value="<?php print($data[0]) ?>"><?php print($data[1]) ?></option>
                            <?php
                        }
                        ?>
  </select>
  </div>        
  </div>
                      </div>
                    <hr class="my-4">
                    <input type="button" value="Registrar" name="registrar" id="registrar" class="w-15 btn btn-primary btn-lg" >
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class = "row">
        <div class="col-lg-12 custom_container">
          <div class="row justify-content-start">
            <div class="col-lg-4 text-left">
              <form action="" method="post">
                <div class="form-group">
                  <label for="buscar" class="form-laberl">Busqueda</label>
                  <input type="text" name="buscar" id="buscar" placeholder="filtro de busqueda" class="form-control">
                </div>
              </form>
            </div>
          </div>

        <h4 class="text-center">Mis Transportistas</h4>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>RFC</th>
                    <th>Nombre</th>
                    <th>Especializacion</th>
                    <th>Experiencia</th>
                    <th>Telefono</th>
                    <th>Estatus</th>
                    <th>Sede</th>
                    <th>Opciones</th>
                </thead>
                <tbody id="trailero_result">
                </tbody>
            </table>
        </div>
  </div>
</div>
  </main>
  <script src="js/script_trailero.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>