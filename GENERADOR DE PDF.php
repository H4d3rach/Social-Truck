<?php
    include ("conector.php");

    // Consulta SQL para obtener los datos del usuario con ID 3
    $sql = "SELECT * FROM usuario WHERE id_usuario = '$usuarioxd'";

    // Ejecutar la consulta
    $resultado = $conect->query($sql);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Obtener los datos del primer y único registro
        $row = $resultado->fetch_assoc();

        // Guardar los datos en variables de sesión
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

// Verifying if the rol_id is 3 and the id_usuario matches
if ($rol_id == 1) {
    // SQL query to get the trip data
    $sqlViaje = "SELECT * FROM viaje WHERE id_viaje = $viajexd";

    // Execute the trip query
    $resultadoViaje = $conect->query($sqlViaje);

    if ($resultadoViaje->num_rows > 0) {
        $rowViaje = $resultadoViaje->fetch_assoc();

        // Store the data in regular variables
        $id_viaje = $rowViaje["id_viaje"];
        $lugar_recogida = $rowViaje["lugar_recogida"];
        $lugar_destino = $rowViaje["lugar_destino"];
        $descripcion = $rowViaje["descripcion"];
        $precio = $rowViaje["precio"];
        $nombre_traslado = $rowViaje["nombre_traslado"];
        $nombre_ingreso = $rowViaje["nombre_ingreso"];
        $url_cp_traslado = $rowViaje["url_cp_traslado"];
        $url_cp_ingreso = $rowViaje["url_cp_ingreso"];
        $hora_inicio = $rowViaje["hora_inicio"];
        $hora_fin = $rowViaje["hora_fin"];
        $fecha_inicio = $rowViaje["fecha_inicio"];
        $fecha_fin = $rowViaje["fecha_fin"];
        $calificacion = $rowViaje["calificacion"];
        $estatus_id_viaje = $rowViaje["estatus_id"];
        $camion_placa = $rowViaje["camion_placa"];
        $semi_no_ide = $rowViaje["semi_no_ide"];
        $transportista_id = $rowViaje["transportista_id"];
        $representante_trans_id = $rowViaje["representante_trans_id"];
        $representante_cliente = $rowViaje["representante_cliente"];

        // Perform actions with the trip data
        // ...

        $sqlestatusviaje = "SELECT * FROM estatus_v WHERE id_estatus = '$estatus_id_viaje'";
        $resultadoestatusviaje = $conect->query($sqlestatusviaje);

        if ($resultadoestatusviaje->num_rows > 0) {
            $rowestatusviaje = $resultadoestatusviaje->fetch_assoc();
            $estatusdelviaje = $rowestatusviaje['estatus'];
        }

        $sqlnombretrasnportista = "SELECT * FROM usuario WHERE id_usuario = '$transportista_id'";
        $resultadonombretransportista = $conect->query($sqlnombretrasnportista);

        if ($resultadonombretransportista->num_rows > 0) {
            $row = $resultadonombretransportista->fetch_assoc();
            $nombretransportista = $row['nombre'];
        }

        $sqlnombrecliente = "SELECT * FROM usuario WHERE id_usuario = '$representante_cliente'";
        $resultadonombrecliente = $conect->query($sqlnombrecliente);

        if ($resultadonombrecliente->num_rows > 0) {
            $row = $resultadonombrecliente->fetch_assoc();
            $nombrecliente = $row['nombre'];
            $empresa_razoncliente = $row['empresa_razon'];
        }

        $sqlcamion = "SELECT * FROM camion WHERE placa = '$camion_placa'";
        $resultadocamion = $conect->query($sqlcamion);

        if ($resultadocamion->num_rows > 0) {
            $rowcamion = $resultadocamion->fetch_assoc();
            $tipo_id_camion = $rowcamion['tipo_id'];
        }

        $sqltipocamion = "SELECT * FROM tipo_camion WHERE id_tipo = '$tipo_id_camion'";
        $resultadotipocamion = $conect->query($sqltipocamion);

        if ($resultadotipocamion->num_rows > 0) {
            $rowtipocamion = $resultadotipocamion->fetch_assoc();
            $tipo_camion = $rowtipocamion['tipo'];
        }

        $sqlEmpresatransportista = "SELECT * FROM empresa WHERE razon_social = '$empresa_razon'";
        $resultadoEmpresatransportista = $conect->query($sqlEmpresatransportista);

        if ($resultadoEmpresatransportista->num_rows > 0) {
            $rowEmpresatransportista = $resultadoEmpresatransportista->fetch_assoc();
            $nombre_comercialtransportista = $rowEmpresatransportista["nombre_comercial"];
            $rfctransportista = $rowEmpresatransportista["rfc"];
            $direccion_transportista = $rowEmpresatransportista["dirección_fiscal"];
            $url_pagina_webtransportista = $rowEmpresatransportista["url_pagina_Web"];
            $url_red_socialtransportista = $rowEmpresatransportista["url_red_social"];
            $dir_oficinas_principalestransportista = $rowEmpresatransportista["dir_oficinas_principales"];
            $especializacion_empresatransportista = $rowEmpresatransportista["especialización"];
            $certificacionestransportista = $rowEmpresatransportista["certificaciones"];
        }

        $sqlEmpresacliente = "SELECT * FROM empresa WHERE razon_social = '$empresa_razoncliente'";
        $resultadoEmpresacliente = $conect->query($sqlEmpresacliente);

        if ($resultadoEmpresacliente->num_rows > 0) {
            $rowEmpresacliente = $resultadoEmpresacliente->fetch_assoc();
            $razon_socialcliente = $rowEmpresacliente["razon_social"];
            $nombre_comercialcliente = $rowEmpresacliente["nombre_comercial"];
            $rfcrazon_social = $rowEmpresacliente["rfc"];
            $direccion_fiscalrazon_social = $rowEmpresacliente["dirección_fiscal"];
            $url_pagina_webrazon_social = $rowEmpresacliente["url_pagina_Web"];
            $url_red_socialrazon_social = $rowEmpresacliente["url_red_social"];
            $dir_oficinas_principalesrazon_social = $rowEmpresacliente["dir_oficinas_principales"];
            $especializacion_empresarazon_social = $rowEmpresacliente["especialización"];
            $certificacionesrazon_social = $rowEmpresacliente["certificaciones"];
        }
            
          } else {
            echo "No se encontraron resultados para el ID de usuario y rol especificados.";
          }
        } else {
          echo "No se cumple la condición del rol_id y el id_usuario.";
        }
      } else {
        echo "No se encontraron resultados para el ID de usuario $id_usuario";
      }// Verificar si se ha enviado el formulario
?>
<!DOCTYPE html>
<html>
<head>
  <title>Generador de Documentos PDF</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
  <script>
    function generatePDF() {
      var pdf = new jsPDF({
        orientation: 'p',
        unit: 'mm',
        format: 'a5',
        putOnlyUsedFonts: true
      });

      var img = new Image();
      img.src = 'imagenes/logo.png';
      img.onload = function() {
        var canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0, img.width, img.height);
        var dataURL = canvas.toDataURL('image/png');

        pdf.addImage(dataURL, 'PNG', 115, 10, 30, 20);

        pdf.setFontSize(16);
        pdf.setFontStyle('bold');
        var title = "SOCIAL TRUCK";
        var titleWidth = pdf.getStringUnitWidth(title) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        var titleOffset = (pdf.internal.pageSize.width - titleWidth) / 2;
        pdf.text(title, titleOffset, 20);

        pdf.setFontSize(14);
        pdf.setFontStyle('normal');
        var subtitle = "COMPROBANTE DE CONTRATO";
        var subtitleWidth = pdf.getStringUnitWidth(subtitle) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
        var subtitleOffset = (pdf.internal.pageSize.width - subtitleWidth) / 2;
        pdf.text(subtitle, subtitleOffset, 30);

        // Línea horizontal debajo de "Comprobante de Contrato"
        var lineY1 = 34;
        var lineWidth1 = pdf.internal.pageSize.width - 15;
        pdf.setLineWidth(.8);
        pdf.line(15, lineY1, lineWidth1, lineY1);

        // Datos a imprimir
        var datos = [
          { label: "Id Viaje:", value: "<?php echo $id_viaje; ?>" },
          { label: "Lugar de Recogida:", value: "<?php echo $lugar_recogida; ?>" },
          { label: "Lugar de Destino:", value: "<?php echo $lugar_destino; ?>" },
          { label: "Descripción:", value: "<?php echo $descripcion; ?>" },
          { label: "Precio:", value: "<?php echo $precio; ?>" },
          { label: "Hora de Inicio:", value: "<?php echo $hora_inicio; ?>" },
          { label: "Hora de Fin:", value: "<?php echo $hora_fin; ?>" },
          { label: "Fecha de Inicio:", value: "<?php echo $fecha_inicio; ?>" },
          { label: "Fecha de Fin:", value: "<?php echo $fecha_fin; ?>" },
          { label: "Calificación:", value: "<?php echo $calificacion; ?>" },
          { label: "Estatus ID:", value: "<?php echo $estatusdelviaje; ?>" },
          { label: "Camión Placa:", value: "<?php echo $camion_placa; ?>" },
          { label: "Semi-noide:", value: "<?php echo $semi_no_ide; ?>" },
          { label: "Transportista ID:", value: "<?php echo $nombretransportista; ?>" },
          { label: "Representante Trans ID:", value: "<?php echo $nombre; ?>" },
          { label: "Representante Cliente:", value: "<?php echo $nombrecliente; ?>" },
          { label: "Tipo de Camión:", value: "<?php echo $tipo_camion; ?>" },
          { label: "Nombre de la E. Cliente :", value: "<?php echo $empresa_razoncliente; ?>" },
          { label: "Razon social de E. Cliente:", value: "<?php echo $nombre_comercialcliente; ?>" },
          { label: "Nombre de la E. Transportista :", value: "<?php echo $empresa_razon; ?>" },
          { label: "Razon social de E. Transportista:", value: "<?php echo $nombre_comercialtransportista; ?>" }
        ];


        var lineHeight = 6;
        var startY = 40;

        datos.forEach(function(dato) {
          pdf.setFontSize(9);
          pdf.text(dato.label, 20, startY);
          pdf.text(dato.value, 70, startY);
          startY += lineHeight;
        });

        // Línea horizontal al final del documento
        var lineY2 = pdf.internal.pageSize.height - 20;
        var lineWidth2 = pdf.internal.pageSize.width - 15;
        pdf.setLineWidth(0.8);
        pdf.line(15, lineY2, lineWidth2, lineY2);

        // Texto del pie de página
        pdf.setTextColor(80, 80, 80); // Establece el color del texto en gris oscuro utilizando los valores RGB (80, 80, 80)
        pdf.setFontSize(7); // Establece el tamaño de fuente del texto en 7 puntos

        var footerText = "Todos nuestros servicios poseen una garantía acondicionada a nuestros términos y condiciones";
        // Define el texto del pie de página que se mostrará

        var footerLines = pdf.splitTextToSize(footerText, lineWidth2 - 70);
        // Divide el texto en líneas para asegurarse de que se ajuste dentro del ancho de línea establecido,
        // utilizando el ancho máximo permitido para el texto (lineWidth2 - 70)

        var footerOffset = (pdf.internal.pageSize.width - pdf.getStringUnitWidth(footerText) * pdf.internal.getFontSize() / pdf.internal.scaleFactor) / 2;
        // Calcula el desplazamiento necesario para alinear el texto del pie de página en el centro de la página

        pdf.text(footerLines, lineWidth2 - 50, lineY2 + 10, { align: "right", maxWidth: lineWidth2 - 70 });
        // Muestra el texto del pie de página en las coordenadas (lineWidth2 - 15, lineY2 + 10) con las siguientes opciones:
        //   - "align": "right" alinea el texto a la derecha
        //   - "maxWidth": lineWidth2 - 70 establece el ancho máximo permitido para el texto

        
        var pdfData = pdf.output('datauristring');

        var pdfFilename = 'contrato_<?php echo $id_viaje;?>_<?php echo $representante_trans_id;?>_<?php echo $representante_cliente;?>.pdf';

        pdf.save('contrato_<?php echo $id_viaje;?>_<?php echo $representante_trans_id;?>_<?php echo $representante_cliente;?>.pdf');
      };
    }
    function dataURLToBlob(dataURL) {
      var parts = dataURL.split(';base64,');
      var contentType = parts[0].split(':')[1];
      var raw = window.atob(parts[1]);
      var rawLength = raw.length;
      var uInt8Array = new Uint8Array(rawLength);

      for (var i = 0; i < rawLength; ++i) {
        uInt8Array[i] = raw.charCodeAt(i);
      }

      return new Blob([uInt8Array], { type: contentType });
    }
  </script>
</head>
<body>
    <?php
        if (!empty($url_cp_traslado) && !empty($nombre_traslado) && !empty($url_cp_ingreso) && !empty($nombre_ingreso)) {
        // El código a ejecutar si las condiciones son verdaderas
        // Aquí puedes incluir el código JavaScript que se ejecuta al cargar la página
    ?>
  <button onclick="generatePDF()">Generar Contrato</button>
  
  <?php
        }
        else{
    ?>
    Falla al encontrar sus archivos, debe de subir los archivos de traslado e ingreso
    <?php
        }   
    ?>
</body>
</html>
