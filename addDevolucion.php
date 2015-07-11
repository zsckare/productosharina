<?php 
$idruta=trim($_POST['idruta']);
$rutaa=$idruta;
	$fecha=date("Y-m-d", strtotime($_POST['fecha']));
	include("php/conexion.php");
	$link=Conectarse();
	$id_dcto="";
	$rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos WHERE id_ruta='$idruta' ");
	if ($row = mysql_fetch_row($rs)) {
		$id_dcto = trim($row[0]);
	}

	$ocultarform=mysql_query("UPDATE `documentos` SET `verform` = '1' WHERE `id_dcto` = $id_dcto; ");


	$traerProductos="SELECT * FROM productos ORDER BY id_producto";
	$query=mysql_query($traerProductos);
	$max=mysql_num_rows($query);
	$arreglo[0]="";
	$idruta=$_POST['idruta'];
	$var="";
	$c="";
	//se reciben todos los datos de formulario
	for ($i=1; $i <=$max ; $i++) { 
		$c+='r'.$i;
		$var="r".$i;
		$arreglo[$i]=$_REQUEST[$var];
	}
	for ($j=1; $j <=$max ; $j++) { 
		echo " ".$arreglo[$j]." - ";
	}

	//ciclo para insertar un movimiento para cada producto
	
	for ($k=1; $k <=$max ; $k++) { 
		$insertamov=mysql_query("INSERT INTO movimientos (id_mov,id_producto,id_dcto,devolucion,id_ruta,fecha,tipo) VALUES(null, '$k', '$id_dcto', '$arreglo[$k]', '$idruta', '$fecha', 1 )");
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
		header('Location: revisar.php?idruta='.$rutaa);
 ?>