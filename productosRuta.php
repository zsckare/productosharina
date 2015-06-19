<?php 

$id_prod=$_POST['id_prod'];
$cantidad=$_POST['cantidad'];
$id_ruta=$_POST['idruta'];
include("php/conexion.php");
	$link=Conectarse();
	$insertar="INSERT INTO movimientos (id_mov,id_producto,devolucion) VALUES (null,'$id_prod','$cantidad')";
	mysql_query($insertar)or die(mysql_error());

 ?>