<?php 
$id_dcto=$_POST['id_dcto'];
$id_prod=$_POST['id_prod'];
$cantidad=$_POST['cantidad'];
$id_ruta=$_POST['idruta'];
include("php/conexion.php");
	$link=Conectarse();
	$insertar="INSERT INTO movimientos (id_mov,id_producto,id_dcto,devolucion,id_ruta,tipo) VALUES (null,'$id_prod','$id_dcto','$cantidad','$id_ruta','1')";
	mysql_query($insertar)or die(mysql_error());

 ?>