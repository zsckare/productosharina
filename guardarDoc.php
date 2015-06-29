#ENESTA VERSION LAS CARGAS SE ACUMULAN  A LO QUE HAYA QUEDADO EN LA CARGA


<?php 
$idruta=trim($_POST['idruta']);
$fecha=date("Y-m-d", strtotime($_POST['fecha']));

include("php/conexion.php");
$link=Conectarse();

	$insertar="INSERT INTO `harina`.`documentos` (`id_dcto`, `fecha`, `id_ruta`) VALUES (NULL, '$fecha', '$idruta')";
	if (mysql_query($insertar)) {
		$id_dcto=mysql_insert_id();
	}
	#echo '<script type="text/javascript">alert("REGISTRADO :)");</script>';

	
	#script para acumlular los productod de un mismo tipo en la carga
	$ID_productos[0]="";
	$prd=mysql_query("SELECT * FROM productos ORDER BY id_producto ASC");
	$total=mysql_num_rows($prd);
	$t=0;
	while ($o=mysql_fetch_row($prd)) {
		$ID_productos[$t]=$o[0];
		$t++;
	}
	#----------------se hace un ciclo para crear las cargas vacias para cada producto--------

		for ($p=0; $p <$total ; $p++) { 
			$cipr=mysql_query("SELECT * FROM cargas WHERE ir_ruta='$idruta' AND id_producto='$ID_productos[$p]'  ");
			if ($nume=mysql_num_rows($cipr)<1) {
			mysql_query("INSERT INTO cargas (`id_carga`, `ir_ruta`, `id_producto`, `existencia`, `fecha`) VALUES (NULL, '$idruta', '$ID_productos[$p]', 0, CURRENT_TIMESTAMP ) ");
			
			}else{}
		}

	#---------------------------------------

	#-----------------------------------
	$acumulador=0;
	for ($i=0; $i <$total ; $i++) { 
		$result=mysql_query("SELECT * FROM movimientos WHERE id_producto='$ID_productos[$i]' AND id_ruta='$idruta' AND tipo=0 AND id_dcto='$id_dcto' ");
		#ALmaceno lo que habia en la carga
			$cargaactual=mysql_query("SELECT existencia FROM cargas WHERE ir_ruta='$ruta' AND id_producto='$ID_productos[$i]' ");
			$m=mysql_fetch_row($cargaactual);
			$acumulador+=$m[0];
			$inicio=$acumulador;
			
		#------------------------
		if ($w=mysql_num_rows($result)>0) {
			while ($row=mysql_fetch_row($result)) {
			$acumulador+=$row[3];
		    }
		    
		  	$guardacarga="INSERT INTO cargas (`id_carga`, `ir_ruta`, `id_producto`, `existencia`, `fecha`) VALUES (NULL, '$idruta', '$ID_productos[$i]', '$acumulador', CURRENT_TIMESTAMP)";
			mysql_query($guardacarga)or die(mysql_error());
			$acumulador=0;
			$compruenaregistro=mysql_query("SELECT * FROM cargas WHERE ir_ruta='$idruta' AND id_producto='$ID_productos[$i]'  ");
			if ($com=mysql_num_rows($compruenaregistro)>1) {
				#si ya existe un registro anterior con el id del producto en turno se elimina de la tabla de cargas
				$primer=mysql_query("SELECT id_carga FROM cargas WHERE id_producto='$ID_productos[$i]' AND ir_ruta='$idruta' ORDER BY fecha ASC LIMIT 1  ");
				if ($del=mysql_fetch_row($primer)) {
					#echo "".$del[0];
					$borrar=mysql_query("DELETE FROM cargas WHERE id_carga='$del[0]' ");
				}
			}

		} else {
		
		}
		

	}

	
	header("Location: cargas.php");
 ?>