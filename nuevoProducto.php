<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Registrar Nuevo Producto</title>

  <!-- CSS  -->
 		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >

<?php include 'navegacion.php'; ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
		<div class="card paddin-largo ">
			<div class="row">
                    <h3 class="center-align">Nuevo Producto</h3>
                  </div>
			<div class="row">
				<form action="nuevoProducto.php" method="POST" class="center-align" enctype="multipart/form-data">
					<div class="row ">
						<div class="center-align">
								<div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
								<label for="ap" >Nombre del Producto</label>
								<input id="ap" type="text" name="nombre" required>
							</div>
						</div>					
					</div>
					<div class="row ">
						<div class="center-align">
								<div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
								<label for="ap" >Codigo del Producto</label>
								<input id="ap" type="text" name="codigo" required>
							</div>
						</div>					
					</div>
						<div class="row ">
						<div class="center-align">
								<div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
								<label for="ap" >Precio del Producto</label>
								<input id="ap" type="text" name="precio" required>
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
			$phat="img/";
			$nombre=trim($_POST['nombre']);
			$codigo=trim($_POST['codigo']);
			$precio=trim($_POST['precio']);



				include("php/conexion.php");
				$link=Conectarse();
				$insertar="INSERT INTO `productos` (`id_producto`, `codigoproducto`, `nombre`, `precio`) VALUES (NULL, '$codigo', '$nombre', '$precio');";
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