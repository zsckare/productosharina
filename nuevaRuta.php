<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Registrar Nueva Ruta</title>

  <!-- CSS  -->
 		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >

<?php include 'navegacion.php'; ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
		<div class="card paddin-largo ">
			<div class="row">
                    <h3 class="center-align">Nueva Ruta</h3>
                  </div>
			<div class="row">
				<form action="nuevaRuta.php" method="POST" class="col m12" enctype="multipart/form-data">
					<div class="row ">
						<div class="center-align">
								<div class="input-field col m8 s12 l8 offset-l2 offset-m2">
								<label for="ap" >Nombre de la Ruta</label>
								<input id="ap" type="text" name="nombre" required>
							</div>
						</div>					
					</div>
					<div class="row ">
						<div class="center-align">
								<div class="input-field col m8 s12 offset-m2">
								<label for="ap" >Codigo de Ruta</label>
								<input id="ap" type="text" name="codigo" required>
							</div>
						</div>					
					</div>
					<div class="row">
						<div class="center">
							<input class="light-blue darken-4 btn " type="submit" value="Registrar" required>
						</div>	
					</div>
				</form>
			</div>
		</div>
		
	</div>


	<?php
		
		if(isset($_POST['nombre']))
		{
			$nombre=trim($_POST['nombre']);
			$codigo=trim($_POST['codigo']);



				include("php/conexion.php");
				$link=Conectarse();
				$insertar="INSERT INTO `rutas` (`id_ruta`, `codigo_ruta`, `nom_ruta`) VALUES (NULL, '$codigo', '$nombre');";
				mysql_query($insertar)or die(mysql_error());
				echo '<script type="text/javascript">alert("REGISTRADO :)");</script>';

		}
	?>
	<!--SCRIPTS-->
    
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>