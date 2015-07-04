    <?php 
    session_start();
    if($_SESSION['u_tipo']==1){

    }
    else{
      header("Location: index.php");
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Harina.dev</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">

<?php include ('navegacion.php'); ?>
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
	$ultimasDEV[0]="";
	$getLast=mysql_query("SELECT * FROM movimientos WHERE tipo=1 AND id_ruta='$idruta' AND fecha='$fecha' ORDER BY id_producto ASC");
	$tamanio=mysql_num_rows($getLast);

	
	$t=0;
	while ($getLastDev=mysql_fetch_row($getLast)) {
		$ultimasDEV[$t]=$getLastDev[4];
		$t++;
		$id_dcto=$getLastDev[2];

	}
		
	$borramovdev=mysql_query("DELETE FROM movimientos WHERE tipo=1 AND id_ruta='$idruta' AND fecha='$fecha' ");
	
?>
<div class="container">
	<div class="card paddin-largo">
	<div class="row">
		<h4 class="center-align">Productos Que regresaron</h4>
	</div>
		<form action="addDevolucion.php" method="post">
			<?php 
			$s=0;
				for ($i=0; $i <$ci ; $i++) { 
					echo '<div class="row">';
					for ($j=0; $j <4 ; $j++) { 
						while ($row=mysql_fetch_row($query)) {
							echo '
								
									<div class="input-field col s3 m3 l3 ">
										<label for="'.$row[0].'">'.$row[2].'</label>
										<input id="'.$row[0].'" type="number" name="r'.$row[0].'" value="'.$ultimasDEV[$s].'" >
									</div>
							
							';
							$s++;
						}
					}
					echo '</div>';
				}
				echo '<input type="hidden" value="'.$idruta.'" name="idruta" >';
				echo '<input type="hidden" value="'.$fecha.'" name="fecha" >';
			?>
		<input type="submit" class="btn light-blue darken-4 " >
		</form>
	</div>
</div>

 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</body>
</html>