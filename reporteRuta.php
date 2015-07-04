<?php 
  session_start();
  if(isset($_SESSION['u_user'])){

  }
  else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Harina.dev</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">
<?php include("navegacion.php"); ?>
<?php 
  $id_ruta="";
    if (isset($_GET['id_ruta'])) {
      $id_ruta=trim($_GET['id_ruta']);
    }else{
      $id_ruta=$_POST['id_ruta'];
    }
?>
  <div class="container">
    <div class="card">
      <div class="row">
        <h5 class="center-align">Seleccionar Fechas</h5>
        <form action="reporteRuta.php">
          <input type="hidden" name="id_ruta" value="<?php echo $id_ruta; ?>" >
          <div class="row">
            <div class="input-field col s3 m3 l3 offset-s2 offset-m2 offset-l2">
            <label for="desde">Desde</label>
              <input id="desde" type="date" name="desde" class="datepicker">
            </div>
            <div class="input-field col s3 m3 l3">
            <label for="hasta">Hasta</label>
              <input id="hasta" type="date" name="hasta" class="datepicker">
            </div>
            <div class="input-field col s3 m3 l3">
              <input type="submit">
            </div>
          </div>
        </form>
      </div>
    <?php 
      if (isset($_POST['desde'])) {
        $desde=$_POST['desde'];
        $hasta=$_POST['hasta'];

        $movimientos=mysql_query("SELECT * FROM movimientos WHERE id_ruta='$id_ruta' AND fecha >='$desde' AND fecha <='$hasta' ORDER BY id_producto ASC");
        $falt=mysql_query("SELECT * FROM extras ");
      }

    ?>





    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

</body>
</html>
