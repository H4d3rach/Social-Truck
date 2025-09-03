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
    if(isset($_POST['data'])){
        $id_viaje = $_POST['data'];
        $_SESSION['id_viaje']=$id_viaje;
    }else{
        $id_viaje = $_SESSION['id_viaje'];
    
    }
    if(isset($_POST['precio'])){
        $precio = $_POST['precio'];
        $id_usu = $_POST['idu'];
        $cam = $_POST['camion'];
        $semi = $_POST['semi'];
        $upd = "UPDATE viaje SET precio=$precio , estatus_id=3, camion_placa='$cam',semi_no_ide=$semi,transportista_id='$id_usu'
        WHERE id_viaje='$id_viaje'";
        $up = mysqli_query($conect,$upd);
        $upd2 = "UPDATE semirremolque SET estatus_id=2 WHERE no_serie=$semi";
        $up2 = mysqli_query($conect,$upd2);

        $upd3 = "UPDATE camion SET estatus_id=2 WHERE placa='$cam'";
        $up3 = mysqli_query($conect,$upd3);

        $upd4 = "UPDATE usuario SET estatus_id=5 WHERE id_usuario='$id_usu'";
        $up4 = mysqli_query($conect,$upd4);
        header('location: detalles_viaje_reptrans.php');
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
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 230px;">
    <div class="sticky-top">
      <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img class="logo" src="imagenes/logo.png" alt="" width="45" height="35">
        <span class="fs-4">Social Truck</span>
      </a>
      <hr>
      <ul class="nav flex-column mb-auto">
        <li>
          <a href="representante_trans.php" class="nav-link link-body-emphasis" aria-current="page">
            <img class="icono" src="imagenes/home.png" alt="home">
            Home
          </a>
        </li>
        <li>
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
  <div class="container">
        <?php
            $rol=$_SESSION['usuario']['rol'];
            if($rol==1){
                if(empty($camion)){
                    echo"
                    <form action='#' method='post' id='frm' class='needs-validation' novalidate>
                    <div class='row'>
                      <div class='col-lg-6 offset-md-3 mt-4'>
                        <div class='card'>
                          <div class='card-header'>
                            <h3>Configuraci&oacuten del viaje</h3>
                          </div>
                          <div class='card-body'>
                              <div class='row'>
                                <div class='col-md-12 mb-2'>
                                  <label for='precio' class='form-label'>Defina el precio</label>
                                  <input type='number' step='0.01' class='form-control' name='precio' id='precio' placeholder=''
                                    value=''>
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-8 mb-2'>
                                  <label for='idu' class='form-label'>Ingrese a su operador</label>
                                  <select class='custom-select d-block w-100' name='idu' id='idu' >";
                                        $first = "SELECT empresa_razon from usuario WHERE id_usuario='$reptrans'";
                                        $cons = mysqli_query($conect,$first);
                                        $row1 = $cons->fetch_array();
                                        $emprazon = $row1['empresa_razon'];
                                      $consulta = "SELECT usuario.id_usuario, usuario.nombre, usuario.primer_apellido, usuario.segundo_apellido FROM usuario, estatus_u, sede WHERE
                                     usuario.estatus_id = estatus_u.id_estatus AND usuario.sede_id = sede.id_sede AND usuario.empresa_razon='$emprazon' AND rol_id=3";
                                      $query = mysqli_query($conect,$consulta);
                                      $row = $query->fetch_all();
                                      foreach($row as $data){
                                        
                                        echo"<option value='".$data[0]."'>".$data[1]." " .$data[2]." " .$data[3]."</option>";
                            
                                    }
                                echo"
                                    </select>
                                    
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-8 mb-2'>
                
                                  <label for='camion' class='form-label'>Ingrese a su cami&oacuten</label>
                                  <select class='custom-select d-block w-100' name='camion' id='camion' >";
                                      $consulta = "SELECT camion.placa, camion.modelo FROM camion,sede WHERE camion.sede_id = sede.id_sede 
                                      AND sede.empresa_rs = '$emprazon'";
                                      $query = mysqli_query($conect,$consulta);
                                      $row = $query->fetch_all();
                                      foreach($row as $data){
                                        
                                        echo"<option value='".$data[0]."'>".$data[0]." " .$data[1]." " .$data[3]."</option>";
                            
                                    }
                                echo"
                                    </select>
                                    
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-8 mb-2'>
                
                                  <label for='semi' class='form-label'>Ingrese a su semirremolque</label>
                                  <select class='custom-select d-block w-100' name='semi' id='semi' >";
                                      $consulta = "SELECT semirremolque.no_serie, tipo_semirremolque.tipo FROM semirremolque,sede,tipo_semirremolque 
                                      WHERE semirremolque.sede_id = sede.id_sede and semirremolque.tipo_id=tipo_semirremolque.id_tipo and sede.empresa_rs = '$emprazon'";
                                      $query = mysqli_query($conect,$consulta);
                                      $row = $query->fetch_all();
                                      foreach($row as $data){
                                        
                                        echo"<option value='".$data[0]."'>".$data[0]." " .$data[1]." " .$data[3]."</option>";
                            
                                    }
                                echo"
                                    </select>
                                    
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class='row mt-4'>
                    
                    <div class='col-lg-6 offset-md-3 mt-4'>
                        <input type='submit' value='Configurar' name='registrar' id='registrar' class='w-35 btn btn-primary btn-lg offset-md-3'>
                    </div>
                    </div>
                    </form>";
                }else{
                    if(empty($horainic)){
                        echo"<h3>El cliente está terminando de configurar</h3>";
                    }else{
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
                        //$empresa_razon = $row['empresa_razon'];
                       
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
                }
            }
        ?>
</div>
</main>
<script src="js/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>