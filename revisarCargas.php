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
  $ruta=$_GET['id_ruta'];
  $id_ruta=$ruta;
  include("php/conexion.php");
  $link=Conectarse();
 $rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos WHERE id_ruta='$id_ruta' ",$link);
if ($row = mysql_fetch_row($rs)) {
$id_dcto = trim($row[0]);
}
$consultaproductos=mysql_query("SELECT * FROM productos ");
$numproductos=mysql_num_rows($consultaproductos);
 ?>
<div class="backline be-blue"></div>
  <div class="container espacio-arriba">
<div class="row">
  <div class="col s12 m12 l12">
        <div class="card paddin-largo ">
      <div class="row">
                    <h3 class="center-align">Productos en ruta</h3>
            </div>
            <div class="row">
              <p class="col m3 s3 ">Ruta:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $id_ruta;  ?></p>
              <p class="col m3 s3 ">Fecha:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $fecha; ?></p>
                <a href="#new" class="col m2 s2 l2 offset-m3 offset-s2 offset-l3 modal-trigger"><p class="center-align botnnva">Agregar Producto</p></a>
            </div>
      <div id="prodCargados" class="row"><!--tabla de productos agregados-->
      
      </div><!--tabla de productos agregados-->
      <div class="row">
        <form action="devoluciones.php" method="Post">
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
      <form id="form" action="" name="agregarProductos" onsubmit="verProdsRuta(); return false">
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
           <div class="input-field col m1 s2 l1 ">
            <input id="cant" type="number" name="cantidad" value="0" style="width:3em;">
            <label for="cant" class="active">Cantidad</label>
          </div>

          <div class="col s9 m9 l9  ">
          <div class="row">
            <div class="col s9 m9 l9">
              <div class="row">
                <div class="col s3 m3 offset-s1 offset-m1 "><input type="button" value="9" class="botonesadd" onclick="add('9')" ></div>
                <div class="col s3 m3 "><input type="button" value="8" class="botonesadd" onclick="add('8')"></div>
                <div class="col s3 m3 "><input type="button" value="7" class="botonesadd" onclick="add('7')"></div>
              </div>
              <div class="row">
                <div class="col s3 m3 offset-s1 offset-m1 "><input type="button" value="6" class="botonesadd" onclick="add('6')"></div>
                <div class="col s3 m3 "><input type="button" value="5" class="botonesadd" onclick="add('5')"></div>
                <div class="col s3 m3 "><input type="button" value="4" class="botonesadd" onclick="add('4')"></div>
              </div>
              <div class="row">
                <div class="col s3 m3 offset-s1 offset-m1 "><input type="button" value="3" class="botonesadd" onclick="add('3')"></div>
                <div class="col s3 m3 "><input type="button" value="2" class="botonesadd" onclick="add('2')"></div>
                <div class="col s3 m3 "><input type="button" value="1" class="botonesadd" onclick="add('1')"></div>
              </div>
              <div class="row">
                <div class="col s3 m3 offset-s1 offset-m1 "><input type="button" value="0" class="botonesadd" onclick="add('0')"></div>
                <div class="col s6 m3 "><input type="button" value="Borrar" onclick="borrar();" class="borrar"></div>
              </div>
            </div>
            <div class="col s3 m3 l3">
              <div class="row">
              <div class="col s2 m2 l2">
              <input name="Submit" type="submit" class="light-blue darken-4 btn " value="Agregar" >
            </div>
          </div>
            </div>
            

          </div>
                      
          </div>
    
          
          </div>
      </from>
      </div>
  </div>
</div>


  <!--SCRIPTS-->
    
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/ajax.js"></script>
    <script>
  function add (numero) {
    addProductos=document.agregarProductos.cantidad.value;
    addProductos+=numero;
    console.log("-----");
    console.log("- addProductos -");
    console.log("Cambiando valor en el input por:"+addProductos);
    document.agregarProductos.cantidad.value=addProductos;
    
  }
  function borrar(){
    console.log("-----");
    console.log("Limpiando el valor del input cantidad");
    document.agregarProductos.cantidad.value="";
  }
  </script>
</body>
</html>