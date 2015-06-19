<?php
include("php/conexion.php");
$link=Conectarse();
//variable GET

$idemp=$_GET['id_mov'];
$id_mov=$idemp;
$ruta="eli";
//elimina el registro de la tabla empleados
$sql="DELETE FROM movimientos WHERE id_mov= '$idemp'";

mysql_query($sql,$link) or die(mysql_error());
$sqlq="DELETE FROM cargas WHERE id_mov= '$id_mov' ";

mysql_query($sqlq,$link) or die(mysql_error());
?>