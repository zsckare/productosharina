
<?php 
	include("php/conexion.php");
	$link=Conectarse();

	$delDoc=mysql_query("DELETE FROM documentos");
	$delMov=mysql_query("DELETE FROM movimientos");
	$delExt=mysql_query("DELETE FROM extras");
	echo '	<script>
		alert("Vaciando Base de Datos");

	function redireccionar(){
	  window.location="dashboard.php";
	} 
	setTimeout ("redireccionar()", 1000); 
	</script>';
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
	<div class="container">
		<div class="row">
			<div class="col s3 m3 l3 offset-s3 offset-m3 offset-l3">
				<div class="card">
					<p>Espere Por Favor...</p>
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
