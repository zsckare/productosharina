    <?php 
    session_start();
    if(isset($_SESSION['u_user'])){
      $username=$_SESSION['u_user'];
      $ruta=$_SESSION['ruta'];
    }
    else{
      header("Location: ../index.php");
    }
    date_default_timezone_set("America/Mexico_City");
	$fecha= date("Y-m-d");
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Gastos del Dia</title>

  <!-- CSS  -->
 		<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >

<?php include 'nav.php'; ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
		<div class="card paddin-largo ">
			<div class="row">
                    <h3 class="center-align">Gastos</h3>
                  </div>
			<div class="row">
				<form action="gastos.php" method="POST" class="col s12 m12 l12">
					<?php echo '<input type="hidden" name="idruta" value="'.$ruta.'" >'; ?>

					<div class="row">
						<div class="input-field col s12 m8 l5 offset-m2 offset-l1">
							<label for="gas">Gasolina</label>
							<input id="gas" type="text" name="gasolina" >
						</div>

						<div class="input-field col s12 m8 l5 offset-m2 ">
							<label for="via">Viaticos</label>
							<input id="via" type="text" name="viaticos" >
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m8 l5 offset-m2 offset-l1">
							<label for="lav">Lavado</label>
							<input id="lav" type="text" name="lavado" >
						</div>

						<div class="input-field col s12 m8 l5 offset-m2 ">
							<label for="lav">Promocion</label>
							<input id="lav" type="text" name="promocion" >
						</div>
					</div>					
					<div class="row">
						<div class="input-field col s12 m8 l10 offset-m2 offset-l1">
							<label for="lav">Otros Gastos</label>
							<input id="lav" type="text" name="otros" >
						</div>
					</div>
					<div class="row">
						<div class="center">
							<input type="submit" value="Registrar" class="btn" >
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>


	<?php
	include("../php/conexion.php");
	$link=Conectarse();
	$consultadcto=mysql_query("SELECT * FROM documentos WHERE id_ruta='$ruta' AND fecha='$fecha'  ORDER BY hora DESC");
	$row=mysql_fetch_row($consultadcto);
	$dcto=$row[0];
	
		
		if(isset($_POST['idruta']))
		{
			$gasolina=trim($_POST['gasolina']);
			$viaticos=trim($_POST['viaticos']);
			$lavado=trim($_POST['lavado']);
			$promociones=trim($_POST['promocion']);
			$otros=trim($_POST['otros']);

			$insertar=mysql_query("INSERT INTO extras (`id_exttra`, `id_dcto`, `promocion`, `gasolina`, `viaticos`, `lavado`, `gastosvarios`) VALUES ('', '$dcto', '$promociones', '$gasolina', '$viaticos', '$lavado', '$otros')");
			echo '<script>
		    alert("Registrado");
		    </script>';
			echo '<script>
		   		window.location="home.php";
		    </script>';
		   
		}

	?>
	<!--SCRIPTS-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
</body>
</html>