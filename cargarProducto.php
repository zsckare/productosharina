<?php 
$id_docto=$_POST['id_dcto'];
$id_prod=$_POST['id_prod'];
$cantidad=$_POST['cantidad'];
$id_ruta=$_POST['idruta'];
$fecha=$_POST['fecha'];
$id_mov="";
include("php/conexion.php");
	$link=Conectarse();
	$insertar="INSERT INTO movimientos (id_mov,id_producto,id_dcto,carga,id_ruta,fecha) VALUES (null,'$id_prod','$id_docto','$cantidad','$id_ruta','$fecha')";
	if(mysql_query($insertar)){
		  $ultimo_id = mysql_insert_id(); #trae el ultimo id insertado en l tabla
	}

	$id_mov = $ultimo_id;

	$guardacarga="INSERT INTO `harina`.`cargas` (`id_carga`, `ir_ruta`, `id_producto`, `existencia`, `fecha`, `id_mov`) VALUES (NULL, '$id_ruta', '$id_prod', '$cantidad', CURRENT_TIMESTAMP, '$id_mov')";
	mysql_query($guardacarga)or die(mysql_error());
	include("tablatemp.php"); 
 ?>