<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Harina.dev</title>

  <!-- CSS  -->
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">
    <?php 
    session_start();
    if(isset($_SESSION['u_user'])){
      $username=$_SESSION['u_user'];
    }
    else{
      header("Location: ../index.php");
    }
  ?>
  <?php include("nav.php"); ?>
<div class="backline be-blue"></div>
  <div class="container espacio-arriba">
<div class="row">
      <a href="gastos.php" class=" pnl card col m4 s12 offset-m1">
          <div class="row ">
            <div class="col m12 s12 center-align">
              .<i class="medium mdi-maps-local-atm"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <h4 class="center-align" >Gastos</h4>
            </div>
          </div>
      </a><!--  Rutas-->

      <a href="" class="pnl card col m4 s12 offset-m2">
          <div class="row up-space">
            <div class="col m12 s12 center-align ">
              <i class="medium  mdi-notification-event-note"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <h4 class="center-align" >Notas a Credito</h4>
            </div>
          </div>
      </a><!--  Productoss-->
    </div>
  </div><!--  Contenedor-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
