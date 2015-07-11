<?php
	date_default_timezone_set("America/Mexico_City");
	$fecha= date("Y-m-d");
	include("php/conexion.php");
	$link=Conectarse();
	$id_dcto=$_GET['id_dcto'];
	$result=mysql_query("SELECT * FROM documentos WHERE id_dcto='$id_dcto' ");
	$row=mysql_fetch_row($result);
	$verform=$row[9];
	$traerProductos="SELECT * FROM productos ORDER BY id_producto ";
	$query=mysql_query($traerProductos);
	$pod=mysql_num_rows($query);
	$n=$pod/4;
	$ci=round($n);
	$p=0;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
		<title>Ver Dcto<?php echo " ".$row[0]; ?></title>
		<!-- CSS  -->
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body class="gray-blue">
		<?php include 'navegacion.php'; ?>
		<?php
		$nombreruta="";
		$idruta=$row[2];
		$cons=mysql_query("SELECT nom_ruta FROM rutas WHERE id_ruta='$idruta' ");
		$fila=mysql_fetch_row($cons);
		$nombreruta=$fila[0];
		$nombreproducto[0]="";
		$i=0;
		$j=0;
		$productos=mysql_query("SELECT * FROM productos ORDER by id_producto");
		while ($fil=mysql_fetch_row($productos)) {
			$nombreproducto[$j]=$fil[2];
			$j++;
		}
		?>
		<div class="backline be-blue"></div>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="card paddin-largo ">
						<div class="row"><h3 class="center-align">Hoja</h3></div>
						<div class="row">
							<div class="col s12 m4 l4 offset m1 offset-l1">
								<div class="row">
									<h4 class="center-align">Salida</h4>
								</div>
								<div class="row paddin-largo">
									<?php
										$sellevo=mysql_query("SELECT * FROM movimientos WHERE id_dcto='$id_dcto' AND tipo =0 ORDER BY id_producto  ");
											while ($row=mysql_fetch_row($sellevo)) {
												echo '<div class="row">';
															echo '<div class="col s6 m6 l6">'.$nombreproducto[$i].'</div>';
															echo '<div class="col s6 m6 l6">'.$row[3].'</div>';
												echo "</div>";
												$i++;
											}
									?>
								</div>
							</div>
							<div class="col s12 m5 l5 offset m1 offset-l1">
								<div class="row">
									<h4 class="center-align">Devolucion</h4>
								</div>
								<div class="row">
									<?php if($verform==0){ ?>
									<form action="addDevolucion.php" method="post">
										<?php
											for ($i=0; $i <$ci ; $i++) {
												echo '<div class="row">';
														for ($j=0; $j <4 ; $j++) {
															while ($rowq=mysql_fetch_row($query)) {
																echo '
																	
																		<div class="input-field col s3 m3 l3 ">
																			<label for="'.$rowq[0].'">'.$rowq[2].'</label>
																			<input id="'.$rowq[0].'" type="number" name="r'.$rowq[0].'" value="0" >
																		</div>
																
																';
															}
														}
												echo '</div>';
											}
											echo '<input type="hidden" value="'.$idruta.'" name="idruta" >';
											echo '<input type="hidden" value="'.$fecha.'" name="fecha" >';
										?>
										<input type="submit" class="btn light-blue darken-4 " >
									</form>
									<?php }else{ ?>
									<div class="row paddin-largo">
										<?php
											$sellevo=mysql_query("SELECT * FROM movimientos WHERE id_dcto='$id_dcto' AND tipo =1 ORDER BY id_producto  ");
												while ($row=mysql_fetch_row($sellevo)) {
													echo '<div class="row">';
																echo '<div class="col s6 m6 l6">'.$nombreproducto[$p].'</div>';
																echo '<div class="col s6 m6 l6">'.$row[4].'</div>';
													echo "</div>";
													$p++;
												}
										?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>