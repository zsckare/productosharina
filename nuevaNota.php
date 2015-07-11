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

	?>
	<div class="container">
		<div class="card paddin-largo">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="row">
						<h4 class="center-align">Nueva Nota de Credito</h4>
					</div>
				</div>
				<form action="nuevaNota.php" method="POST">
					<div class="row">
						<div class="input-field col s4 m4 l4">
							
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<?php 
	 ?>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>
</html>
