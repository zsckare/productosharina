<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Revisar Carga</title>

  <!-- CSS  -->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >
<?php include 'navegacion.php'; ?>
<?php 

		# en este archivo se hace la revision de que carga se llevo y que carga regreso
		# asi como los calculos necesarios para saber con cuanto dinero tiene que entregar
		# por las ventas realizadas
	$ruta="";$id_dcto="";
		$fecha="";
		if (isset($_POST['idruta'])) {
			$ruta=$_POST['idruta'];

			
		}else{
			$ruta=$_GET['idruta'];
			
		}
		include("php/conexion.php");
			$link=Conectarse();
		$rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos WHERE id_ruta='$ruta' ");
		if ($row = mysql_fetch_row($rs)) {
			$id_dcto = trim($row[0]);
		}
		$nameruta=mysql_query("SELECT nom_ruta FROM rutas WHERE id_ruta='$ruta' ");
		$nr=mysql_fetch_row($nameruta);
		$nombreruta=$nr[0];
		$precio[0][0]="";
		$result=mysql_query("SELECT * FROM productos ORDER BY id_producto ASC");
		$totfilas=mysql_num_rows($result);
			
		$nombreprodcuto="";
		$id="";
		$name="";
		$ids="";
		$i=0;
		$j=0;
		while ($fila=mysql_fetch_row($result)) {
			$precio[$i][$j]=$fila[3];
			$i++;
		}
		#echo '<pre>';
		#print_r($precio);
		#echo '</pre>';
		$pi=0;
		$pj=0;
		$productosout[0]="";
		$productosback[0]="";
		$totalventa[0]=0;
?>
<div class="backline be-blue"></div>
<div class="container espacio-arriba">
	<div class="card paddin-largo">
		<div class="row">
			<h4 class="center-align">Revision de Carga de <?php echo $nombreruta; ?></h4>
		</div>

		<div class="row">
			
			<div class="col s12 m6 l6" >
	<div class="row ">
		<div class="col s5 m5 l5">
			<div class="row">
				<div class="center-align">
					Salio
				</div>
			</div>
			
				<div class="row">
					<div class="col s12 m12 l12">
						<table>
							<thead>
								<tr>
									<th data-field="id">nombre</th>
									<th data-field="name">se llevo</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$reg=mysql_query("SELECT * FROM movimientos WHERE id_ruta='$ruta' AND tipo=0 AND id_dcto='$id_dcto' ORDER BY id_producto ASC ");
								while ($rs = mysql_fetch_row($reg)){
									$ids=trim($rs[1]);
									$name=mysql_query("SELECT * FROM productos WHERE id_producto='$ids' ",$link);
									if ($rows = mysql_fetch_row($name)) {
										$nombreprodcuto = trim($rows[2]);
										}
										
									
								echo '<tr>
												<td>'.$nombreprodcuto.'</td>
												<td>'.$rs[3].'</td>
									</tr>';
									$productosout[$pi]=$rs[3];
									$pi++;
								}
								
								?>
							</tbody>
						</table>
					</div>
				</div>
				</div><!-- div que muestra cuanto producto tenia en la cargta -->
				<div class="col s5 m5 l5 box">
					<div class="row">
						<div class="center-align">
							Regreso
						</div>
					</div>
					<div class="row">
						<table>
							<thead>
								<tr>
									<th data-field="id">nombre</th>
									<th data-field="name">regreso</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$consulta="SELECT * FROM movimientos WHERE id_ruta='$ruta' AND tipo =1 AND id_dcto='$id_dcto' ORDER BY id_producto ASC";
								$res=mysql_query($consulta);
								while ($rowa=mysql_fetch_row($res)) {
										$id=trim($rowa[1]);
										
									$name=mysql_query("SELECT * FROM productos WHERE id_producto='$id' ",$link);
									if ($rows = mysql_fetch_row($name)) {
										$nombreprodcuto = trim($rows[2]);
										}
									echo '<tr>
											<td>'.$nombreprodcuto.'</td>
											<td>'.$rowa[4].'</td>
									</tr>';
									$productosback[$pj]=$rowa[4];
									$pj++;
								}
								
								?>
							</tbody>
						</table>
					</div>
					</div><!-- div que muestra con cuanto producto regereso -->
					<div class="col s2 m2 l2">
						<div class="row">
							<div class="center-align">
								$
							</div>
						</div>
						<div class="row">
							<table>
								<thead>
									<tr>
										
										<th data-field="name">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$max=sizeof($productosout);
									$vendidos[0]=0;
									$vntproducto[0]=0;
									for ($q=0; $q <$max ; $q++) {
										if ($productosback[$q]==0) {
											$vendidos[$q]=$productosout[$q];
										}else{
											$vendidos[$q]=$productosout[$q]-$productosback[$q];
										}
									}
									for ($w=0; $w <$max ; $w++) {
										$vntproducto[$w]=$precio[$w][0]*$vendidos[$w];
										echo '<tr>
													<td>'.$vntproducto[$w].'</td>
											</tr>';
									}
									?>
								</tbody>
							</table>
						</div>
			</div><!-- div que muestra el total de venta de cada prodcuto -->
		</div>
				<div class="row">
				<div class="col s4 m4 l4 offset-s8 offset-m8 offset-l8">
					<?php 
					$subtotal=0;
					for ($e=0; $e <$max ; $e++) { 
						$subtotal+=$vntproducto[$e];
					}
					echo '<p class="subtotal">Subtotal: $'.$subtotal.'</p>';
					?>
				</div>
			</div><!-- div donde muestro el subtotal -->
	</div>




	<div class="col s12 m6 l6" >
	<div class="row">
		<form action="afectarCarga.php" method="POST">
			<div class="row"><h5 class="center-align">Gastos</h5></div>
			<div class="row">
				<div class="input-field col s12 m8 l5 offset-m2 offset-l1">
					<label for="gas">Gasolina</label>
					<input id="gas" type="text" name="gasolina" >
				</div>
				<div class="input-field col s12 m8 l5 offset-m2 ">
					<label for="via">Viaticos</label>
					<input id="via" type="text" name="viaticos" >
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m8 l5 offset-m2 offset-l1">
					<label for="lav">Lavado</label>
					<input id="lav" type="text" name="lavado" >
				</div>
				<div class="input-field col s12 m8 l5 offset-m2 ">
					<label for="lav">Promocion</label>
					<input id="lav" type="text" name="promocion" >
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m8 l5 offset-m2 offset-l1">
					<label for="lav">Otros Gastos</label>
					<input id="lav" type="text" name="otros" >
				</div>
				<div class="input-field col s12 m8 l5 offset-m2 ">
					<label for="fal">Faltante</label>
					<input id="fal" type="text"name="faltante" placeholder="$0.0">
				</div>
			</div>
			<?php
			echo '
			<input type="hidden" name="ruta" value="'.$ruta.'">
			<input type="hidden" name="id_dcto" value="'.$id_dcto.'">
			<input type="hidden" name="subtotal" value="'.$subtotal.'">
			';
			?>
			<div class="center">
				<input type="submit" value="Guardar" class="boton-largo botnnva" >
			</div>
			
		</form>
		</div><!-- div que contendra elformulario que afectara la carga -->
</div>
		</div>


	</div>
</div>


<?php 
/*
echo '<pre>';
print_r($productosout);
echo '</pre>';
echo '<pre>';
print_r($productosback);
echo '</pre>';
echo '<pre>';
print_r($vendidos);
echo '</pre>';
*/	
 ?>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>