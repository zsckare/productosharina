<?php 
$idruta=trim($_POST['idruta']);
	$fecha=date("Y-m-d", strtotime($_POST['fecha']));
	include("php/conexion.php");
	$link=Conectarse();
	//se crea un nuevo documento
	$insertar="INSERT INTO `documentos` (`id_dcto`, `fecha`, `id_ruta`) VALUES (NULL, '$fecha', '$idruta')";
	if (mysql_query($insertar)) {
		$id_dcto=mysql_insert_id();
	}
	//-----------crear nuevo extra para el documento creado---
		$extra=mysql_query("INSERT INTO extras (id_exttra, id_dcto, fecha, id_ruta) VALUES (NULL, $id_dcto, $fecha , $idruta ) ");
	//--------------------------------------------------------
	$traerProductos="SELECT * FROM productos ORDER BY id_producto";
	$query=mysql_query($traerProductos);
	$max=mysql_num_rows($query);
	$arreglo[0]="";
	$idruta=$_POST['idruta'];
	$var="";
	$c="";
	//se reciben todos los datos de formulario
	for ($i=1; $i <=$max ; $i++) { 
		$c+='n'.$i;
		$var="n".$i;
		$arreglo[$i]=$_REQUEST[$var];
	}
	for ($j=1; $j <=$max ; $j++) { 
		echo " ".$arreglo[$j]." - ";
	}

	//ciclo para insertar un movimiento para cada producto
	
	for ($k=1; $k <=$max ; $k++) { 
		$insertamov=mysql_query("INSERT INTO movimientos (id_mov,id_producto,id_dcto,carga,id_ruta,fecha) VALUES(null, '$k', '$id_dcto', '$arreglo[$k]', '$idruta', '$fecha' )");
	}
/*
	//ciclo para crear cargas vacias
			for ($p=1; $p <$max ; $p++) { 
			$cipr=mysql_query("SELECT * FROM cargas WHERE ir_ruta='$idruta' AND id_producto='$arreglo[$p]'  ");
			if ($nume=mysql_num_rows($cipr)<1) {
			mysql_query("INSERT INTO cargas (`id_carga`, `ir_ruta`, `id_producto`, `existencia`, `fecha`) VALUES (NULL, '$idruta', '$arreglo[$p]', 0, CURRENT_TIMESTAMP ) ");
			
			}else{}
		}
*/
		header("Location: rutas.php");
 ?>