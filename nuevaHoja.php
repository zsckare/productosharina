<?php 
    session_start();
    if($_SESSION['u_tipo']==1){

    }
    else{
      header("Location: index.php");
    }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Harina.dev</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">
<?php include 'navegacion.php'; ?>
<div class="backline be-blue"></div>
<?php 
	date_default_timezone_set("America/Mexico_City");
	$fecha= date("Y-m-d");
	$idruta=$_GET['idruta'];
	include("php/conexion.php");
	$link=Conectarse();
	$traerProductos="SELECT * FROM productos ORDER BY id_producto ";
	$query=mysql_query($traerProductos);

	$pod=mysql_num_rows($query);
	$n=$pod/4;
	$ci=round($n);
	$nomrut=mysql_query("SELECT nom_ruta FROM rutas WHERE id_ruta='$idruta' ");
	$nr=mysql_fetch_row($nomrut);
	$nombre_ruta=$nr[0];
?>
<div class="container">
	<div class="card paddin-largo">
	<div class="row">
	<div class="col s12 m12 l12">
	<div class="row">
		<h4 class="center-align">Productos para <?php echo $nombre_ruta; ?></h4>
	</div>
			<form action="addCarga.php" method="post" name="agregarProductos" class="row">
				<div class="row">
					<div class="col s12 m12	l4	offset-l1">
						<?php 
							for ($i=0; $i <$ci ; $i++) { 
								echo '<div class="row">';
								for ($j=0; $j <4 ; $j++) { 
									while ($row=mysql_fetch_row($query)) {
										echo '
											
												<div class="input-field col s3 m3 l3 ">
													<label for="'.$row[0].'">'.$row[2].'</label>
													<input id="'.$row[0].'" type="number" name="n'.$row[0].'" value="0" >
												</div>
										
										';
									}
								}
								echo '</div>';
							}
					
							echo '<input type="hidden" value="'.$idruta.'" name="idruta" >';
							echo '<input type="hidden" value="'.$fecha.'" name="fecha" >';
						?>
					</div>

				</div>

				<div class="row">
					<div class="center-align">
						<input type="submit" class="btn light-blue darken-4 " >
					</div>
				</div>
		</form>
	</div>
	
	</div>

	</div>
</div>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
 	$("#1").select();
  </script>
  </body>
</html>
