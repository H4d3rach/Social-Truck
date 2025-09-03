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
    <title>Transporte Representante</title>
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
        <div class="col-lg-8">
          <div class="row justify-content-end">
            <div class="col-lg-6 text-right">
              <form action="" method="post">
              </form>
            </div>
          </div>
        <h4>Mis Contratos</h4>
            <table class="table table-hover table-responsive">
                <thead>
                    <th>ID_Viaje</th>
                    <th>Lugar Recogida</th>
                    <th>Lugar destino</th>
                    <th>Descripcion</th>
                    <th>ID_cliente</th>
                    <th>ID_transportista</th>
                    <?php 
                    $id_user = $_SESSION['usuario']['id'];

                    $sql = "SELECT * FROM usuario WHERE id_usuario = '$id_user'";
                    $resultado = $conect->query($sql);
                    if (!$resultado) {
                        echo "Error executing query: " . $conect->error;
                    }
                    if ($resultado->num_rows > 0) {
                        $row = $resultado->fetch_assoc();
                        $id_usuario = $row["id_usuario"];
                        $nombre = $row["nombre"];
                        $primer_apellido = $row["primer_apellido"];
                        $segundo_apellido = $row["segundo_apellido"];
                        $correo = $row["correo"];
                        $contra = $row["contra"];
                        $telefono = $row["telefono"];
                        $especializacion = $row["especializacion"];
                        $years_exp = $row["years_exp"];
                        $ubicacion = $row["ubicacion"];
                        $rol_id = $row["rol_id"];
                        $estatus_id = $row["estatus_id"];
                        $empresa_razon = $row["empresa_razon"];
                        $sede_id = $row["sede_id"];
                    }

                    $consulta ="SELECT * FROM viaje WHERE representante_cliente = '$id_user'";
                    $resultadoViaje = mysqli_query($conect,$consulta);
                    if ($resultadoViaje) {

                    while ($row = mysqli_fetch_assoc($resultadoViaje)) {
                        $viajexd= $row['id_viaje'];
                        $usuarioxd= $row['representante_trans_id'];
                        $id_viaje = $row["id_viaje"];
                        $lugar_recogida = $row["lugar_recogida"];
                        $lugar_destino = $row["lugar_destino"];
                        $descripcion = $row["descripcion"];
                        $precio = $row["precio"];
                        $nombre_traslado = $row["nombre_traslado"];
                        $nombre_ingreso = $row["nombre_ingreso"];
                        $nompre_contratogenerico = $row["nompre_contratogenerico"];
                        $nombre_contrato = $row["nombre_contrato"];
                        $url_cp_traslado = $row["url_cp_traslado"];
                        $url_cp_ingreso = $row["url_cp_ingreso"];
                        $url_cp_contratogenerico = $row["url_cp_contratogenerico"];
                        $url_cp_contrato = $row["url_cp_contrato"];
                        $hora_inicio = $row["hora_inicio"];
                        $hora_fin = $row["hora_fin"];
                        $calificacion = $row["calificacion"];
                        $estatus_id_viaje = $row["estatus_id"];
                        $camion_placa = $row["camion_placa"];
                        $semi_no_ide = $row["semi_no_ide"];
                        $transportista_id = $row["transportista_id"];
                        $representante_trans_id = $row["representante_trans_id"];
                        $representante_cliente = $row["representante_cliente"];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                          $url_cp_trasladoxd = 'D:\\xampp\\htdocs\\definitivo\\Social Truck\\PDFs\\Traslado\\';
                          $url_cp_ingresoxd = 'D:\\xampp\\htdocs\\definitivo\\Social Truck\\PDFs\\Ingreso\\';
                          $url_cp_contratogenericoxd = 'D:\\xampp\\htdocs\\definitivo\\Social Truck\\PDFs\\ContratoGenerico\\';
                          $url_cp_contratoxd = 'D:\\xampp\\htdocs\\definitivo\\Social Truck\\PDFs\\Contrato\\';
                          $url_cp_trasladoxd = addslashes($url_cp_trasladoxd);
                          $url_cp_ingresoxd = addslashes($url_cp_ingresoxd);
                          $url_cp_contratogenericoxd = addslashes($url_cp_contratogenericoxd);
                          $url_cp_contratoxd = addslashes($url_cp_contratoxd);
                          
                      }
                        echo "<tr>
                        <td>".$row['id_viaje']."</td>
                        <td>".$row['lugar_recogida']."</td>
                        <td>".$row['lugar_destino']."</td>
                        <td>".$row['descripcion']."</td>
                        <td>".$row['representante_cliente']."</td>
                        <td>".$row['transportista_id']."</td>
                        <td>";?>
                        <?php if($url_cp_traslado==""){?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="archivo_pdf_traslado"><!--Seleccionar archivo de traslado:--></label>
                            <input type="file" name="archivo_pdf_traslado" id="archivo_pdf_traslado" accept=".pdf" required>
                            <br>
                            <input type="submit" name="submit_traslado" value="Subir Traslado" onclick="location.reload()">
                        </form>
                        <?php }
                        elseif($url_cp_ingreso==""){
                            ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="archivo_pdf_ingreso"><!--Seleccionar archivo de ingreso:--></label>
                            <input type="file" name="archivo_pdf_ingreso" id="archivo_pdf_ingreso" accept=".pdf" required>
                            <br>
                            <input type="submit" name="submit_ingreso" value="Subir Ingreso" onclick="location.reload()">
                        </form>
                        <?php }
                        elseif($url_cp_contratogenerico==""){
                            ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="archivo_pdf_contratogenerico"><!--Seleccionar archivo de ingreso:--></label>
                            <input type="file" name="archivo_pdf_contratogenerico" id="archivo_pdf_contratogenerico" accept=".pdf" required>
                            <br>
                            <input type="submit" name="submit_contratogenerico" value="Subir ContratoGenerico" onclick="location.reload()">
                        </form>
                        <?php 
                            }
                            elseif($url_cp_contrato==""){
                                    include 'GENERADOR DE PDF.php';
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="archivo_pdf_contrato"><!--Seleccionar archivo de Comprobante:--></label>
                            <input type="file" name="archivo_pdf_contrato" id="archivo_pdf_contrato" accept=".pdf" required>
                            <br>
                            <input type="submit" name="submit_contrato" value="Subir Contrato" onclick="location.reload()">
                        </form>
                        <?php       }
                                else{
                                    
                                    echo "<script>
                                    // Función para descargar el archivo PDF
                                    function downloadLocalFile1(filePath, filename) {
                                        fetch(filePath)
                                        .then(function (response) {
                                            return response.blob();
                                        })
                                        .then(function (blob) {
                                            var a = document.createElement('a');
                                            a.href = URL.createObjectURL(blob);
                                            a.setAttribute('download', filename);
                                            a.click();
                                        });
                                    }
                                    function downloadLocalFile2(filePath, filename) {
                                        fetch(filePath)
                                        .then(function (response) {
                                            return response.blob();
                                        })
                                        .then(function (blob) {
                                            var a = document.createElement('a');
                                            a.href = URL.createObjectURL(blob);
                                            a.setAttribute('download', filename);
                                            a.click();
                                        });
                                    }
                                    function downloadLocalFile3(filePath, filename) {
                                        fetch(filePath)
                                        .then(function (response) {
                                            return response.blob();
                                        })
                                        .then(function (blob) {
                                            var a = document.createElement('a');
                                            a.href = URL.createObjectURL(blob);
                                            a.setAttribute('download', filename);
                                            a.click();
                                        });
                                    }
                                    function downloadLocalFile4(filePath, filename) {
                                        fetch(filePath)
                                        .then(function (response) {
                                            return response.blob();
                                        })
                                        .then(function (blob) {
                                            var a = document.createElement('a');
                                            a.href = URL.createObjectURL(blob);
                                            a.setAttribute('download', filename);
                                            a.click();
                                        });
                                    }
                            </script>";
                                if (!empty($url_cp_traslado) && !empty($nombre_ingreso) && !empty($nompre_contratogenerico) && !empty($nombre_contrato)) {
                            ?>
                            <button onclick="downloadLocalFile1('http://localhost/PracticasPHP/Social%20Truck/PDFs/Traslado/<?php echo $nombre_traslado;?>', '<?php echo $nombre_traslado;?>');">Descargar Traslado</button>
                            
                            <button onclick="downloadLocalFile4('http://localhost/PracticasPHP/Social%20Truck/PDFs/Contrato/<?php echo $nombre_contrato;?>', '<?php echo $nombre_contrato;?>');">Descargar Comprobante</button>
                            
                            <?php
                                }
                                else {
                            ?>
                            Sus archivos no han sido subidos
                            <?php
                                }
                                }
                        
                    }} else {
                      echo "Error en la consulta: " . mysqli_error($conect);
                      echo "Consulta SQL: " . $consulta;
                  }?>
                </thead>
            </table>
        </div>
    </div>
</div>
</main>
</body>
</html>