<?php
    include ("conector.php");
    if(isset($_POST['razon']) && isset($_POST['rfcu'])){
        $razon = $_POST['razon'];
        $ncomercial = $_POST['ncomercial'];
        $rfc = $_POST['rfc'];
        $dfiscal = $_POST['dfiscal'];
        $ofprincipales = $_POST['ofprincipales'];
        $web = $_POST['web'];
        $redsocial = $_POST['redsocial'];
        $especializacion = $_POST['especializacion'];
        $certificaciones = $_POST['certificaciones'];
        $nombre = $_POST['nombre'];
        $papellido = $_POST['papellido'];
        $sapellido = $_POST['sapellido'];
        $rfcu = $_POST['rfcu'];
        $cel = $_POST['cel'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $consulta = "SELECT * from empresa WHERE razon_social ='$razon'";
        $resultado = mysqli_query($conect,$consulta);
        if($row = $resultado->fetch_array()){
            $validacion = $row['razon_social'];
            echo '<div class="container">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      El registro ya existe. Por favor, inténtalo nuevamente.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
        }else{
            $insert = "INSERT INTO empresa(razon_social, nombre_comercial, rfc, dirección_fiscal, url_pagina_Web, url_red_social, dir_oficinas_principales, especialización, certificaciones) 
            VALUES ('$razon','$ncomercial','$rfc','$dfiscal','$web','$redsocial','$ofprincipales','$especializacion','$certificaciones')";
            $query = mysqli_query($conect,$insert);
            if($query){
                $resultado = mysqli_query($conect,$consulta);
                $insert = "INSERT INTO usuario(id_usuario,nombre,primer_apellido,segundo_apellido,correo,contra,telefono,rol_id,estatus_id,empresa_razon)
                VALUES ('$rfcu','$nombre','$papellido','$sapellido','$correo','$pass','$cel',1,2,'$razon')";
                $query = mysqli_query($conect,$insert);
                if($query){
                  echo '<div class="container">
                          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            Registro exitoso. ¡Espera por la validacion!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        </div>';
                }
            }
        }

    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Transportistas | Social Truck</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.scss" />
    <link rel="stylesheet" href="css/styles_reg.css" />
    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <div class="col-md-3 mb-2 mb-md-0">
                <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img class="logo" src="imagenes/logo.png" alt="" width="55" height="45">
                    <span class="fs-4">Social Truck</span>
                </a>
              </div>
        
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.html" class="nav-link px-2 link-secondary" style="color: black;">Principal</a></li>
                <li><a href="registro_transp.php" class="nav-link px-2" style="color: black;">Transporte</a></li>
                <li><a href="registro_client.php" class="nav-link px-2" style="color: black;">Cliente</a></li>
                <li><a href="nosotros.php" class="nav-link px-2" style="color: black;">Nosotros</a></li>
              </ul>
              <div class="col-md-3 text-end">
                <button onclick="location.href='login.php' " type="button" class="btn btn-custom-outline-primary me-2">Login</button>
              </div>
            </header>
          </div>
        <div class="container text-center py-5">
          <h1>Registro de Empresa Transportista</h1>
          <form action="#" method="POST">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="razon" name="razon">
            <label for="razon" class="form-label">Razón social</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="ncomercial" name="ncomercial">
            <label for="ncomercial" class="form-label">Nombre comercial</label>
          </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="rfc" name="rfc">
            <label for="rfc" class="form-label">RFC</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="dfiscal" name="dfiscal">
            <label for="dfiscal" class="form-label">Dirección fiscal</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="ofprincipales" name="ofprincipales">
            <label for="ofprincipales" class="form-label">Dirección oficinas principales</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="web" name="web">
            <label for="web" class="form-label">URL página web</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="redsocial" name="redsocial">
            <label for="redsocial" class="form-label">URL red social</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="especializacion" name="especializacion">
            <label for="especializacion" class="form-label">Especialización</label>
          </div>
    </div>
    <div class="">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="certificaciones" name="certificaciones">
            <label for="certificaciones" class="form-label">Certificaciones</label>
          </div>
    </div>
    <h2 class="mt-3">Cuenta del Representante</h2>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="nombre" name="nombre">
            <label for="nombre" class="form-label">Nombre</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="papellido" name="papellido">
            <label for="papellido" class="form-label">Primer Apellido</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="sapellido" name="sapellido">
            <label for="sapellido" class="form-label">Segundo Apellido</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="rfcu" name="rfcu">
            <label for="rfcu" class="form-label">RFC</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="cel" name="cel">
            <label for="cel" class="form-label">Teléfono</label>
        </div>
        <div class="col-sm-6 mt-3">
            <input type="text" class="form-control form-input rounded" id="correo" name="correo">
            <label for="correo" class="form-label">Correo</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-3">
            <input type="password" class="form-control form-input rounded" id="pass" name="pass">
            <label for="pass" class="form-label">Contraseña</label>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-block btn-outline-primary me-2" value="Registrarse">
    </div>
</form>

        </div>
        <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Social Truck</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img class="logo" src="imagenes/logo4.png" alt="" width="40" height="32">
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="index.html" class="nav-link px-2 text-body-secondary">Principal</a></li>
      <li class="nav-item"><a href="registro_transp.php" class="nav-link px-2 text-body-secondary">Registro Empresa Transporte</a></li>
      <li class="nav-item"><a href="registro_client.php" class="nav-link px-2 text-body-secondary">Registro Empresa Cliente</a></li>
      <li class="nav-item"><a href="nosotros.php" class="nav-link px-2 text-body-secondary">Nosotros</a></li>
    </ul>
  </footer>
</div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>