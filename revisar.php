<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Revisar Carga</title>

  <!-- CSS  -->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >
<?php include 'navegacion.php'; ?>
<?php 
	#$ruta=$_POST['ruta'];
	#$fecha=$_POST['fecha'];
	include("php/conexion.php");
	$link=Conectarse();

	$j=0;
	$result=mysql_query("SELECT * FROM produtos",$link);


?>
<div class="backline be-blue"></div>
<div class="container espacio-arriba">
	<div class="card">
		<div class="row">
			<h4 class="center-align">Carga</h4>
		</div>
		<div class="row divider"></div>
		<div class="row ">
			<div class="col s5 m5 l5">
				<div class="row">
					<div class="center-align">
						Salio
					</div>
				</div>
				<div class="row">
					<div class="col s12 m12 l12">
						
					</div>
				</div>
			</div>
			<div class="col s5 m5 l5">
				<div class="row">
					<div class="center-align">
						Regreso
					</div>
				</div>
			</div>
			<div class="col s1 m1 l1">
				<div class="row">
					<div class="center-align">
						$ Venta
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
	



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>