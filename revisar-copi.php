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
$ruta="";
	$fecha="";
	if (isset($_POST['idruta'])) {
		$ruta=$_POST['idruta'];
		
	}else{
		$ruta=$_GET['idruta'];
		
	}
	include("php/conexion.php");
	$link=Conectarse();
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
	$productostotales[0]="";
	$totalventa[0]="";
?>
<div class="backline be-blue"></div>
<div class="container espacio-arriba">
	<div class="card paddin-largo">
		<div class="row">
			<h4 class="center-align">Carga</h4>
		</div>
		<div class="row divider"></div>
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
								$reg=mysql_query("SELECT * FROM cargas WHERE ir_ruta='$ruta'ORDER BY id_producto ASC ");
								while ($rs = mysql_fetch_row($reg)){
									$ids=trim($rs[2]);
									$name=mysql_query("SELECT * FROM productos WHERE id_producto='$ids' ",$link);
									if ($rows = mysql_fetch_row($name)) {
										$nombreprodcuto = trim($rows[2]);
										}
										
									
								echo '<tr>
										<td>'.$nombreprodcuto.'</td>
										<td>'.$rs[3].'</td>
									</tr>';
									$productostotales[$pi]=$rs[3];
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
								$consulta="SELECT * FROM movimientos WHERE tipo=1 AND id_ruta='$ruta' ORDER BY id_producto ASC";
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
									$productostotales[$pj]=$productostotales[$pj]-$rowa[4];
									$totalventa[$pj]=$productostotales[$pj]*$precio[$pj][0];
									$pj++;
								}
				
								 ?>
					        </tbody>
						</table>
				</div>
			</div><!-- div que muestra con cuanto producto regereso -->

			<div class="col s1 m1 l1">
				<div class="row">
					<div class="center-align">
						$
					</div>					
				</div>
				<div class="row">
					<table>
						<thead>
							<tr>
					              
					              <th data-field="name">Totventa</th>
					          </tr>
						</thead>
						<tbody>
							<?php 
							$max=sizeof($totalventa);
							
							for ($p=0; $p <$max ; $p++) { 
								echo "<tr><td>$ ".$totalventa[$p].'</td></tr>';
							}
							 ?>

						</tbody>
					</table>
				</div>
			</div><!-- div que muestra el total de venta de cada prodcuto -->
		</div>
		<div class="row">
			<div class="col s2 m2 l2 offset-m10 offset-m10 offset-l10">
				<?php 
				$subtotal=0;
				for ($o=0; $o <$max ; $o++) { 
					$subtotal+=$totalventa[$o];
				}
				echo '<p class="subtotal">Subtotal: $'.$subtotal.'</p>';
				?>
			</div>
		</div><!-- div donde muestro el subtotal -->
		<div class="row">
			<form action="afectarCarga.php" method="POST">
				<?php 
					echo '
					<input type="hidden" name="ruta" value="'.$ruta.'">
					<input type="hidden" name="subtotal" value="'.$subtotal.'">
					';
				 ?>
				<input type="submit" value="actualizar" >
			</form> 
		</div><!-- div que contendra elformulario que afectara la carga -->
	</div>
</div>
<?php 
#echo '<pre>';
#print_r($precio);
#echo '</pre>';
 ?>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>