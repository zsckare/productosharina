<?php 
$idruta=trim($_POST['idruta']);
$fecha=date("Y-m-d", strtotime($_POST['fecha']));
include("php/conexion.php");
$link=Conectarse();

	$insertar="INSERT INTO `harina`.`documentos` (`id_dcto`, `fecha`, `id_ruta`) VALUES (NULL, '$fecha', '$idruta')";
	mysql_query($insertar)or die(mysql_error());
	echo '<script type="text/javascript">alert("REGISTRADO :)");</script>';
	header("Location: cargas.php");
 ?>