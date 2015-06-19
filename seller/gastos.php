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
    <?php 
    session_start();
    if(isset($_SESSION['u_user'])){
      $username=$_SESSION['u_user'];
    }
    else{
      header("Location: ../index.php");
    }
  ?>
<?php include 'nav.php'; ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
		<div class="card paddin-largo ">
			<div class="row">
                    <h3 class="center-align">Nueva Ruta</h3>
                  </div>
			<div class="row">
				<form action="gastos.php" method="POST" class="col m12">

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
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>
</body>
</html>