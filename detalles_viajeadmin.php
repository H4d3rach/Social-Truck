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
    if(isset($_POST['data'])){
        $id_viaje = $_POST['data'];
        $_SESSION['id_viaje']=$id_viaje;
    }else{
        $id_viaje = $_SESSION['id_viaje'];
    
    }
    $sel = "SELECT * from viaje where id_viaje=$id_viaje";
    $resultado = mysqli_query($conect,$sel);
    $row = $resultado -> fetch_array();
    $recogida = $row['lugar_recogida']; 
    $llegada = $row['lugar_destino']; 
    $descripcion = $row['descripcion']; 
    $precio = $row['precio']; 
    $ntraslado = $row['nombre_traslado']; 
    $ncontratog = $row['nompre_contratogenerico']; 
    $ningreso = $row['nombre_ingreso']; 
    $ncontrato = $row['nombre_contrato']; 
    $urltraslado = $row['url_cp_traslado']; 
    $urlcontratog = $row['url_cp_contratogenerico']; 
    $urlingreso = $row['url_cp_ingreso']; 
    $urlcontrato = $row['url_cp_contrato']; 
    $fecinic = $row['fecha_inicio']; 
    $horainic = $row['hora_inicio']; 
    $fechafin = $row['fecha_fin']; 
    $horafin = $row['hora_fin']; 
    $calif = $row['calificacion']; 
    $estatus = $row['estatus_id']; 
    $camion = $row['camion_placa']; 
    $semi = $row['semi_no_ide']; 
    $transportista = $row['transportista_id']; 
    $reptrans = $row['representante_trans_id']; 
    $repclient = $row['representante_cliente']; 
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
            <br>
            <br>
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
  <div class="container">
        <?php
            $rol=$_SESSION['usuario']['rol'];
            if($rol==4){
                        $sel1 = "SELECT nombre, primer_apellido FROM usuario WHERE id_usuario='$transportista'";
                        $resultado = mysqli_query($conect,$sel1);
                        $row = $resultado -> fetch_array();
                        $nombre_trans = $row['nombre'];
                        $ape_trans = $row['primer_apellido'];
                        $sel2 = "SELECT nombre, primer_apellido, empresa_razon FROM usuario WHERE id_usuario='$reptrans'";
                        $resultado = mysqli_query($conect,$sel2);
                        $row = $resultado -> fetch_array();
                        $nombre_reptrans = $row['nombre'];
                        $ape_reptrans = $row['primer_apellido'];
                        $empresa_razo = $row['empresa_razon'];
                        $sel222 = "SELECT razon_social FROM empresa WHERE razon_social='$empresa_razo'";
                        $resultado = mysqli_query($conect,$sel222);
                        $row = $resultado -> fetch_array();
                        $razonn = $row['razon_social'];
                       
                        $sel3 = "SELECT nombre, primer_apellido, empresa_razon FROM usuario WHERE id_usuario='$repclient'";
                        $resultado = mysqli_query($conect,$sel3);
                        $row = $resultado -> fetch_array();
                        $nombre_repclient = $row['nombre'];
                        $ape_repclient = $row['primer_apellido'];
                        $empresa_razon = $row['empresa_razon'];
                        $sel22 = "SELECT razon_social FROM empresa WHERE razon_social='$empresa_razon'";
                        $resultado = mysqli_query($conect,$sel22);
                        $row = $resultado -> fetch_array();
                        $razon = $row['razon_social'];
                        $sel4 = "SELECT placa,modelo FROM camion WHERE placa='$camion'";
                        $resultado = mysqli_query($conect,$sel4);
                        $row = $resultado -> fetch_array();
                        $placa = $row['placa'];
                        $modelo = $row['modelo'];
                        if($estatus==3){
                            echo"<h3>El operador se dirige a recoger la carga</h3>";
                            echo"
                            <div class='row'>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Detalles del viaje</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='emo' class='form-label'>Empresa</label>
                                      <input type='text' class='form-control' name='emp' id='emp' placeholder=''
                                        value='$razon' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='rep' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='rep' id='rep' placeholder=''
                                        value='$nombre_repclient $ape_repclient' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='inic' class='form-label'>Lugar Inicio</label>
                                      <input type='text' class='form-control' name='inic' id='inic' placeholder=''
                                        value='$recogida' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='dest' class='form-label'>Lugar Destino</label>
                                      <input type='text' class='form-control' name='dest' id='dest' placeholder=''
                                        value='$llegada' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='desc' class='form-label'>Descripci&oacuten</label>
                                      <textarea type='text' class='form-control' name='desc' id='desc' placeholder=''
                                        value='' readonly>$descripcion</textarea>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='finic' class='form-label'>Fecha Inicio</label>
                                      <input type='date' class='form-control' name='finic' id='finic' placeholder=''
                                        value='$fecinic' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hinic' class='form-label'>Hora Inicio</label>
                                      <input type='time' class='form-control' name='hinic' id='hinic' placeholder=''
                                        value='$horainic' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='ffin' class='form-label'>Fecha Fin</label>
                                      <input type='date' class='form-control' name='ffin' id='ffin' placeholder=''
                                        value='$fechafin' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hfin' class='form-label'>Hora Fin</label>
                                      <input type='time' class='form-control' name='hfin' id='hfin' placeholder=''
                                        value='$horafin' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Configuraci&oacuten</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Empresa Transporte</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$razonn' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_reptrans $ape_reptrans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Operador</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_trans $ape_trans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='placas' class='form-label'>Placas</label>
                                      <input type='text' class='form-control' name='placas' id='placas' placeholder=''
                                        value='$placa' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='camion' class='form-label'>Cami&oacuten</label>
                                      <input type='text' class='form-control' name='camion' id='camion' placeholder=''
                                        value='$modelo' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='noid' class='form-label'>No. Identificaci&oacuten Remolque</label>
                                      <input type='text' class='form-control' name='noid' id='noid' placeholder=''
                                        value='$semi' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                            ";
                        } else if($estatus==4){
                            echo"<h3>El operador embarc&oacute y se dirige a su destino</h3>";
                            echo"
                            <div class='row'>
                            <div class='col-lg-6'>
                              <div class='card'>
                                
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='emo' class='form-label'>Empresa</label>
                                      <input type='text' class='form-control' name='emp' id='emp' placeholder=''
                                        value='$razon' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='rep' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='rep' id='rep' placeholder=''
                                        value='$nombre_repclient $ape_repclient' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='inic' class='form-label'>Lugar Inicio</label>
                                      <input type='text' class='form-control' name='inic' id='inic' placeholder=''
                                        value='$recogida' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='dest' class='form-label'>Lugar Destino</label>
                                      <input type='text' class='form-control' name='dest' id='dest' placeholder=''
                                        value='$llegada' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='desc' class='form-label'>Descripci&oacuten</label>
                                      <textarea type='text' class='form-control' name='desc' id='desc' placeholder=''
                                        value='' readonly>$descripcion</textarea>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='finic' class='form-label'>Fecha Inicio</label>
                                      <input type='date' class='form-control' name='finic' id='finic' placeholder=''
                                        value='$fecinic' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hinic' class='form-label'>Hora Inicio</label>
                                      <input type='time' class='form-control' name='hinic' id='hinic' placeholder=''
                                        value='$horainic' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='ffin' class='form-label'>Fecha Fin</label>
                                      <input type='date' class='form-control' name='ffin' id='ffin' placeholder=''
                                        value='$fechafin' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hfin' class='form-label'>Hora Fin</label>
                                      <input type='time' class='form-control' name='hfin' id='hfin' placeholder=''
                                        value='$horafin' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Configuraci&oacuten</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Empresa Transporte</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$razonn' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_reptrans $ape_reptrans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Operador</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_trans $ape_trans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='placas' class='form-label'>Placas</label>
                                      <input type='text' class='form-control' name='placas' id='placas' placeholder=''
                                        value='$placa' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='camion' class='form-label'>Cami&oacuten</label>
                                      <input type='text' class='form-control' name='camion' id='camion' placeholder=''
                                        value='$modelo' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='noid' class='form-label'>No. Identificaci&oacuten Remolque</label>
                                      <input type='text' class='form-control' name='noid' id='noid' placeholder=''
                                        value='$semi' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                            ";
                        }else if($estatus == 5){
                            echo"<h3>El operador lleg&oacute a su destino, espere su pago</h3>";
                            echo"
                            <div class='row'>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Detalles del viaje</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                <div class='col-md-12 mb-2'>
                                  <label for='oper' class='form-label'>Empresa Transporte</label>
                                  <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                    value='$razon' readonly>
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-12 mb-2'>
                                  <label for='oper' class='form-label'>Representante</label>
                                  <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                    value='$nombre_reptrans $ape_reptrans' readonly>
                                </div>
                              </div>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='emo' class='form-label'>Empresa</label>
                                      <input type='text' class='form-control' name='emp' id='emp' placeholder=''
                                        value='$razon' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='rep' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='rep' id='rep' placeholder=''
                                        value='$nombre_repclient $ape_repclient' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='inic' class='form-label'>Lugar Inicio</label>
                                      <input type='text' class='form-control' name='inic' id='inic' placeholder=''
                                        value='$recogida' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='dest' class='form-label'>Lugar Destino</label>
                                      <input type='text' class='form-control' name='dest' id='dest' placeholder=''
                                        value='$llegada' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='desc' class='form-label'>Descripci&oacuten</label>
                                      <textarea type='text' class='form-control' name='desc' id='desc' placeholder=''
                                        value='' readonly>$descripcion</textarea>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='finic' class='form-label'>Fecha Inicio</label>
                                      <input type='date' class='form-control' name='finic' id='finic' placeholder=''
                                        value='$fecinic' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hinic' class='form-label'>Hora Inicio</label>
                                      <input type='time' class='form-control' name='hinic' id='hinic' placeholder=''
                                        value='$horainic' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='ffin' class='form-label'>Fecha Fin</label>
                                      <input type='date' class='form-control' name='ffin' id='ffin' placeholder=''
                                        value='$fechafin' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hfin' class='form-label'>Hora Fin</label>
                                      <input type='time' class='form-control' name='hfin' id='hfin' placeholder=''
                                        value='$horafin' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Configuraci&oacuten</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Empresa Transporte</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$razonn' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_reptrans $ape_reptrans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Operador</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_trans $ape_trans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='placas' class='form-label'>Placas</label>
                                      <input type='text' class='form-control' name='placas' id='placas' placeholder=''
                                        value='$placa' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='camion' class='form-label'>Cami&oacuten</label>
                                      <input type='text' class='form-control' name='camion' id='camion' placeholder=''
                                        value='$modelo' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='noid' class='form-label'>No. Identificaci&oacuten Remolque</label>
                                      <input type='text' class='form-control' name='noid' id='noid' placeholder=''
                                        value='$semi' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                            ";
                        }else if($estatus == 6){
                            echo"<h3>Viaje Pagado</h3>";
                            echo"
                            <div class='row'>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Detalles del viaje</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                <div class='col-md-12 mb-2'>
                                  <label for='oper' class='form-label'>Empresa Transporte</label>
                                  <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                    value='$razonn' readonly>
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-12 mb-2'>
                                  <label for='oper' class='form-label'>Representante</label>
                                  <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                    value='$nombre_reptrans $ape_reptrans' readonly>
                                </div>
                              </div>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='emo' class='form-label'>Empresa</label>
                                      <input type='text' class='form-control' name='emp' id='emp' placeholder=''
                                        value='$razon' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='rep' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='rep' id='rep' placeholder=''
                                        value='$nombre_repclient $ape_repclient' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='inic' class='form-label'>Lugar Inicio</label>
                                      <input type='text' class='form-control' name='inic' id='inic' placeholder=''
                                        value='$recogida' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='dest' class='form-label'>Lugar Destino</label>
                                      <input type='text' class='form-control' name='dest' id='dest' placeholder=''
                                        value='$llegada' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='desc' class='form-label'>Descripci&oacuten</label>
                                      <textarea type='text' class='form-control' name='desc' id='desc' placeholder=''
                                        value='' readonly>$descripcion</textarea>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='finic' class='form-label'>Fecha Inicio</label>
                                      <input type='date' class='form-control' name='finic' id='finic' placeholder=''
                                        value='$fecinic' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hinic' class='form-label'>Hora Inicio</label>
                                      <input type='time' class='form-control' name='hinic' id='hinic' placeholder=''
                                        value='$horainic' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='ffin' class='form-label'>Fecha Fin</label>
                                      <input type='date' class='form-control' name='ffin' id='ffin' placeholder=''
                                        value='$fechafin' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='hfin' class='form-label'>Hora Fin</label>
                                      <input type='time' class='form-control' name='hfin' id='hfin' placeholder=''
                                        value='$horafin' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-lg-6'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3>Configuraci&oacuten</h3>
                                </div>
                                <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Empresa Transporte</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$razonn' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Representante</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_reptrans $ape_reptrans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-12 mb-2'>
                                      <label for='oper' class='form-label'>Operador</label>
                                      <input type='text' class='form-control' name='oper' id='oper' placeholder=''
                                        value='$nombre_trans $ape_trans' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='placas' class='form-label'>Placas</label>
                                      <input type='text' class='form-control' name='placas' id='placas' placeholder=''
                                        value='$placa' readonly>
                                    </div>
                                    <div class='col-md-6 mb-2'>
                                      <label for='camion' class='form-label'>Cami&oacuten</label>
                                      <input type='text' class='form-control' name='camion' id='camion' placeholder=''
                                        value='$modelo' readonly>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col-md-6 mb-2'>
                                      <label for='noid' class='form-label'>No. Identificaci&oacuten Remolque</label>
                                      <input type='text' class='form-control' name='noid' id='noid' placeholder=''
                                        value='$semi' readonly>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                            ";
                        }
                    }
                
            
        ?>
</div>
</main>
<script src="js/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>