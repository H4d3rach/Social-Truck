<?php
include ("conector.php");
    session_start();
    if(!isset($_SESSION['usuario']['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['usuario']['rol']!=4){
            header('location: login.php');
        }
    }
    $id_user = $_SESSION['usuario']['id'];
    $select ="SELECT id_usuario,nombre,primer_apellido,segundo_apellido,correo,contra,telefono FROM usuario where id_usuario ='$id_user'"; 
    //echo"$select";
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
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px;">
        <div class="sticky-top">
            <a href="#"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img class="logo" src="imagenes/logo.png" alt="" width="45" height="35">
                <span class="fs-4">Social Truck</span>
            </a>
            <hr>
            <ul class="nav flex-column mb-auto">
                <li>
                    <a href="administrador.php" class="nav-link link-body-emphasis" aria-current="page">
                        <img class="icono" src="imagenes/validacion.png" alt="home">
                        Validaci&oacuten de cuentas
                    </a>
                </li>
                <li>
                    <a href="gestion_Admintravel.php" class="nav-link link-body-emphasis" aria-current="page">
                        <img class="icono" src="imagenes/travel.png" alt="sede">
                        Viajes
                    </a>
                </li>
                <li>
                    <a href="gestion_Adminempresas.php" class="nav-link link-body-emphasis">
                        <img class="icono" src="imagenes/companies.png" alt="viajes">
                        Empresas
                    </a>
                </li>
                <li>
                    <a href="gestion_AdminPerfiles.php" class="nav-link link-body-emphasis">
                        <img class="icono" src="imagenes/users.png" alt="camion">
                        Usuarios
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
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle "
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="imagenes/usuario.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Perfil</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="editarperfil_admin.php">Editar</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
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
    <script src="js/script_admin.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>