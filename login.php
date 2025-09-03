<?php
    include ("conector.php");
    session_start();
    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
        header('location: login.php');
    }
    if(isset($_SESSION['usuario']['rol'])){
        switch($_SESSION['usuario']['rol']){
            case 1:
                header('location: representante_trans.php');
                break;
            case 2:
                header('location: representante_client.php');
                break;
            case 3:
                header('location: transportista.php');
                break;
            case 4:
                header('location: administrador.php');
                break;
            default:
            break;
        }
    }
    if(isset($_POST['correo']) && isset($_POST['pass'])){
        $correo = $_POST['correo'];
        $passwd = $_POST['pass'];
        $consulta = "SELECT * from usuario WHERE correo ='$correo' and contra = '$passwd'";
        $resultado = mysqli_query($conect,$consulta);
        if($row = $resultado->fetch_array()){
            $id = $row['id_usuario'];
            $rol = $row['rol_id'];
            $_SESSION['usuario'] = array(
                "id" => $id,
                "rol" => $rol,
            );
            $estatus = $row['estatus_id'];
            if($estatus == 2){
                session_unset();
                session_destroy();
                //header('location: login.php');
                echo '<div class="container">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Aun no has sido validado.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
            }else{
            switch($_SESSION['usuario']['rol']){
                case 1:
                    header('location: representante_trans.php');
                    break;
                case 2:
                    header('location: representante_client.php');
                    break;
                case 3:
                    header('location: transportista.php');
                    break;
                case 4:
                    header('location: administrador.php');
                    break;
                default :
                break;
        }}}else{
            echo '<div class="container">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Correo y/o contraseña incorrectos. Por favor, inténtalo nuevamente.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
        }
        
                
            
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Social Truck</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles_reg.css" />
    </head>
    <body>
    
    <div class="container my-4">
  <div class="d-flex flex-wrap justify-content-center align-items-start py-3 my-4 flex-row">
    <div class="d-flex align-items-center justify-content-end">
      <div class="text-center">
        <img src="imagenes/logologin.png" alt="Imagen" class="img-fluid" width="350">
      </div>
      
      <div class="d-flex justify-content-center align-items-center ms-md-3">
        <div class="card shadow p-3 mb-5 bg-white rounded text-center" style="max-width: 500px;">
          <div class="card-body">
            <form action="#" method="POST">
              <div class="form-group">
                <input type="text" class="form-control w-100" id="correo" name="correo" placeholder="Correo">
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-block btn-outline-primary me-2">Iniciar sesión</button>
              </div>
              <div class="form-group mt-3 border-top">
                <p>¿No tienes cuenta?</p>
              </div>
              <div class="form-group mt-3">
              <a href="registro_client.php" class="btn btn-block btn-custom-outline-primary me-2">Regitrar Empresa Cliente</a>
              </div>
              <div class="form-group mt-3">
              <a href="registro_transp.php" class="btn btn-block btn-custom-outline-primary me-2">Registrar Empresa Transportista</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Social Truck</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img class="logo" src="imagenes/logo.png" alt="" width="40" height="32">
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