<?php 
	
function Conectarse()
{
	$db_host="localhost";
	$db_nombre="harina";
	$db_user="root";
	$db_pass="";
	$link=mysql_connect($db_host, $db_user, $db_pass) or die ("Error conectando a la base de datos.");
	mysql_select_db($db_nombre ,$link) or die("Error seleccionando la base de datos.");
	return $link;
}
 ?>