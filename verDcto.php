<?php 
include("php/conexion.php");
$link=Conectarse();
$id_dcto=$_GET['id_dcto'];

$result=mysql_query("SELECT * FROM documentos WHERE id_dcto='$id_dcto' ");
$row=mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Ver Dcto<?php echo " ".$row[0]; ?></title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">
<?php include 'navegacion.php'; ?>
<?php 
$nombreruta="";
$idruta=$row[2];
$cons=mysql_query("SELECT nom_ruta FROM rutas WHERE id_ruta='$idruta' ");
$fila=mysql_fetch_row($cons);
$nombreruta=$fila[0];

 ?>
<div class="backline be-blue"></div>
  <div class="container">
<div class="row">
<div class="col s12 l12 m12">
      <div class="card paddin-largo">
  <div class="row"><h4 class="center-align">Documento <?php echo " #".$row[0]; ?></h4></div>
    <div class="row encabezado">
      <div class="col s9 m3 l4">
        <h5 class="center-align ">Fecha:<?php echo " ".$row[1]; ?></h5>
      </div>
      <div class="col s3 m3 l3 o offset-m6 offset-l5">
        <h5 class="center-align"><?php echo $nombreruta; ?></h5>
      </div>
    </div><!-- encabezado-->

    <div class="row">
      <div class="col s8 m8 l8 offset-s2 offset-m2 offset-l2 ">
        <ul class="collection with-header collapsible" data-collapsible="expandable">
          
          <li class="collection-item">
              <span class="">Subtotal Ventas</span>
              <span class="espacio-der" ><?php echo $row[7]; ?></span>
          </li>
          <li class="collection-item"><span>Total de Gastos</span><span style="margin-left:15.3em;" ><?php echo $row[4]; ?></span> </li>
          <li class="collection-item"><span>Notas a Credito</span><span style="margin-left:15.5em;"><?php echo $row[5]; ?></span> </li>
          <li class="collection-header"><span class="totales">Gran Total</span><span class="totales" style="margin-left:6.8em;" ><?php echo "$".$row[3]; ?></span></li>
        </ul>

      </div>
    </div>
    </div>
</div>

</div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
