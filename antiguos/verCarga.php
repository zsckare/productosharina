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
	# falta script para acumular los registros con el mismo producto pero diferente cantidad
	$id_ruta=$_GET['id_ruta'];
	
	include("php/conexion.php");
	$link=Conectarse();
	$cons=mysql_query("SELECT codigo_ruta FROM rutas WHERE id_ruta='$id_ruta' ",$link);
	$ruta=mysql_fetch_row($cons);
	$nombreprodcuto="";
	#--------------------------------------------------
	#-------------------SCRIPT ACUMULADOR--------------
	$acum=mysql_query("");
 ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
		<div class="card paddin-largo">
			<h5 class="center-align">Revisando Carga de Ruta <?php echo "".$ruta[0]; ?></h5>
			<table class="striped centered">
				<thead>	
				<tr>
					<td class="center-align">Producto</td>
					<td class="center-align">Cantidad</td>
				</tr>
				</thead>
				<tbody>
				<?php 
				$ruta=$_GET['id_ruta'];
				$link2=Conectarse();
					$result=mysql_query("SELECT * FROM `cargas` WHERE `ir_ruta`=$ruta ORDER BY id_producto");
					while ($row = mysql_fetch_row($result)){
						$ids=trim($row[2]);
						$name=mysql_query("SELECT * FROM productos WHERE id_producto='$ids' ",$link);
						if ($rows = mysql_fetch_row($name)) {
							$nombreprodcuto = trim($rows[2]);
						}
					echo '<tr>
							<td>'.$nombreprodcuto.'</td>
							<td>'.$row[3].'</td>
						  </tr>';
					}
				 ?>
				</tbody>
			</table>
		</div>		
	</div>


	<!--SCRIPTS-->
    
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>
</html>