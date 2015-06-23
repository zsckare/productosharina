<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Registrar Nueva Carga</title>

  <!-- CSS  -->
 		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body class="gray-blue" >

<?php include 'navegacion.php'; ?>
<?php 
	date_default_timezone_set("America/Mexico_City");
	$fecha= date("Y-m-d");
	$id_dcto;
	$ruta=$_GET['categoria'];
	$id_ruta=$ruta;
    include("php/conexion.php");
    $link=Conectarse();
	$rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos",$link);
if ($row = mysql_fetch_row($rs)) {
$id_dcto = trim($row[0]);
}
$id_dcto+=1;

$consultaproductos=mysql_query("SELECT * FROM productos ");
$numproductos=mysql_num_rows($consultaproductos);


 ?>
<div class="backline be-blue"></div>
	<div class="container espacio-arriba">
<div class="row">
  <div class="col s12 m12 l12">
        <div class="card paddin-largo ">
      <div class="row">
                    <h3 class="center-align">Nueva Carga</h3>
            </div>
            <div class="row">
              <p class="col m3 s3 ">Ruta:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $id_ruta;  ?></p>
              <p class="col m3 s3 ">Fecha:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $fecha; ?></p>
                <a href="#new" class="col m2 s1 offset-m3 offset-s7 modal-trigger  medium-letter"><p class="center-align botnnva">Agregar Producto</p></a>
            </div>
      <div id="prodCargados" class="row"><!--tabla de productos agregados-->
      
      </div><!--tabla de productos agregados-->
      <div class="row">
        <form action="guardarDoc.php" method="Post">
          <?php echo '
            <input type="hidden" value='.$id_ruta.' name="idruta">
            <input type="hidden" value='.$fecha.' name="fecha">
          '; ?>
          <div class="center">
            <input type="submit" value="Guardar Carga" class="light-blue darken-4 btn">
          </div>
          
        </form>   
      </div>
    </div>
  </div>
</div>
		
	</div>

<div id="new" class="modal">
  <div class="modal-content">
      <h4 class="center-align">Agregar Producto</h4>
      <div class="row">
      <form id="form" action="" name="agregarProductos" onsubmit="cargarProducto(); return false">
      <?php 
      $n=$numproductos/3;
      $ci=round($n);

      echo '<input type="hidden" value='.$id_ruta.' name="idruta">';
              echo'<input type="hidden" name="id_dcto" value='.$id_dcto.' >';  
              echo'<input type="hidden" name="fecha" value='.$fecha.' >';
          for ($i=0; $i <$ci ; $i++) { 
            echo '<div class="row">';
              for ($j=0; $j <3 ; $j++) { 
                  while ($row = mysql_fetch_row($consultaproductos)){
                    echo '
                    <div class="col s6 m4 l4">
                      <p>
                          <input name="producto" type="radio" id="'.$row[2].'" value="'.$row[0].'" checked/>
                          <label for="'.$row[2].'">'.$row[2].'</label>
                      </p>
                    </div>';

                  }
              }
            echo '</div>';
          }

      ?>
      <div class="row">
           <div class="input-field col m3 s3 l2 offset-l3">
            <input id="cant" type="number" name="cantidad" value="1">
            <label for="cant">Cantidad</label>
          </div>
          <div class="col .s6 m3 l3">
            <input name="Submit" type="submit" class="light-blue darken-4 btn-large " value="Agregar Producto" >
          </div>       
          
          </div>
      </form>
      </div>
  </div>
</div>


  



	<!--SCRIPTS-->
    
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/ajax.js"></script>
  <script></script>
</body>
</html>
