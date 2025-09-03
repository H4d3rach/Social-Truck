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
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="center">Registro y Busqueda</h3>
              </div>
                <div class="card-body">
                    <form action="" method="post" id="frm" class="needs-validation" novalidate>
                      <div class="row">
                        <div class="col-md-2 mb-2">
                    <label for="placa" class="form-label" >Placas</label>
                    <input type="hidden" name="ids" id="ids" value="">
                    <input type="text" class="form-control" name="placa" id="placa" placeholder="" value="" required>
                    <div class="invalid-feedback">
                    Es necesario que ingrese un nombre.
                    </div>
  </div>
                  <div class="col-md-4 mb-2">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="" value="">
  </div>
                    <div class="col-md-2 mb-2">
                    <label for="transmision" class="form-label">Transmision</label>
                    <input type="text" class="form-control" name="transmision" id="transmision" placeholder="" value="">
  </div>
                    <div class="col-md-4 mb-2">
                    <label for="extra" class="form-label">Potencia</label>
                    <input type="text" class="form-control" name="extra" id="extra" placeholder="" value="">
  </div>
  </div>
                    <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="marca" >Marca</label>
                        <select class="custom-select d-block w-100" name="marca" id="marca" >
                        <?php
                          include ("conector.php");
                          $consulta = "SELECT id_marca,marca FROM marca";
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
                        <label for="motor" >Motor</label>
                        <select class="custom-select d-block w-100" name="motor" id="motor" >
                        <?php
                          include ("conector.php");
                          $consulta = "SELECT id_motor,motor FROM motor";
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
                        <label for="tipo" >Tipo</label>
                        <select class="custom-select d-block w-100" name="tipo" id="tipo" >
                        <?php
                          include ("conector.php");
                          $consulta = "SELECT id_tipo,tipo FROM tipo_camion";
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
                    <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="estatus" >Estatus</label>
                        <select class="custom-select d-block w-100" name="estatus" id="estatus" >
                        <?php
                          include ("conector.php");
                          $consulta = "SELECT id_estatus,estatus FROM estatus_c_s";
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

                    <hr class="my-4">
                    <input type="button" value="Registrar" name="registrar" id="registrar" class="w-35 btn btn-primary btn-lg" >
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class = "row">
        <div class="col-lg-12">
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

        <h4 class="text-center">Mis Camiones</h4>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Transmision</th>
                    <th>Potencia</th>
                    <th>Motor</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Sede</th>
                    <th>Opciones</th>
                </thead>
                <tbody id="camion_result">
                </tbody>
            </table>
        </div>
  </div>
</div>
  </main>
  <script src="js/script_camion.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>