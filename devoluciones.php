<?php 
$idruta=$_POST['idruta'];
$fecha=date("Y-m-d", strtotime($_POST['fecha']));
$id_dcto=$_POST['id_dcto'];
include("php/conexion.php");
$link=Conectarse();
$ID_productos[0]="";
	$prd=mysql_query("SELECT * FROM productos ORDER BY id_producto ASC");
	$total=mysql_num_rows($prd);
	$t=0;
	while ($o=mysql_fetch_row($prd)) {
		$ID_productos[$t]=$o[0];
		$t++;
	}

		for ($p=0; $p <$total ; $p++) { 
			$cipr=mysql_query("SELECT * FROM devoluciones WHERE id_ruta='$idruta' AND id_producto='$ID_productos[$p]'  ");
			if ($nume=mysql_num_rows($cipr)<1) {
			mysql_query("INSERT INTO devoluciones (`id_dev`, `id_ruta`, `id_producto`, `devolucion`, `fecha`) VALUES (NULL, '$idruta', '$ID_productos[$p]', 0, CURRENT_TIMESTAMP ) ");
			
			}else{}
		}

	$acumulador=0;  #Variable que sirve para ir acumulandp los producot de un mismo tipo
	for ($i=0; $i <$total ; $i++) { 
		$result=mysql_query("SELECT * FROM movimientos WHERE id_producto='$ID_productos[$i]' AND id_ruta='$idruta' AND tipo=1 AND id_dcto='$id_dcto'  ");
		if ($w=mysql_num_rows($result)>0) {
			while ($row=mysql_fetch_row($result)) {
			$acumulador+=$row[4];
		    }
		    
		  	$guardacarga="INSERT INTO devoluciones (`id_dev`, `id_ruta`, `id_producto`, `devolucion`, `fecha`) VALUES (NULL, '$idruta', '$ID_productos[$i]', '$acumulador', CURRENT_TIMESTAMP)";
			mysql_query($guardacarga)or die(mysql_error());
			$acumulador=0;
			$compruenaregistro=mysql_query("SELECT * FROM devoluciones WHERE id_ruta='$idruta' AND id_producto='$ID_productos[$i]'  ");
			if ($com=mysql_num_rows($compruenaregistro)>1) {
				#si ya existe un registro anterior con el id del producto en turno se elimina de la tabla de cargas
				$primer=mysql_query("SELECT id_dev FROM devoluciones WHERE id_producto='$ID_productos[$i]' AND id_ruta='$idruta' ORDER BY fecha ASC LIMIT 1  ");
				if ($del=mysql_fetch_row($primer)) {
					#echo "".$del[0];
					$borrar=mysql_query("DELETE FROM devoluciones WHERE id_dev='$del[0]' ");
				}
			}

		} else {
		
		}
		

	}

	header("Location: revisar.php?idruta=".$idruta);
 ?>