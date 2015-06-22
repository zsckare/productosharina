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
    <?php 
    session_start();
    if($_SESSION['u_tipo']==1){

    }
    else{
      header("Location: index.php");
    }
  ?>
<?php include 'navegacion.php'; ?>
<div class="backline be-blue"></div>
  <div class="container espacio-arriba">
    <div class="row">
      <a href="rutas.php" class=" pnl card col m4 s12 l4 offset-m1 offset-l1">
          <div class="row ">
            <div class="col m12 s12 l12 center-align">
              .<i class="medium mdi-maps-local-shipping"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <h4 class="center-align" >Rutas</h4>
            </div>
          </div>
      </a><!--  Rutas-->

      <a href="productos.php" class="pnl card col m4 s12 l4 offset-m2 offset-l2">
          <div class="row up-space">
            <div class="col m12 s12 center-align ">
              <i class="medium  mdi-action-shopping-basket"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <h4 class="center-align" >Productos</h4>
            </div>
          </div>
      </a><!--  Productoss-->
    </div>
        <div class="row">
      <a href="documentos.php" class=" pnl card col m4 s12 l4 offset-m1 offset-l1">
          <div class="row up-space">
            <div class="col m12 s12 center-align ">
              <i class=" medium mdi-editor-insert-drive-file"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <h4 class="center-align" >Documentos</h4>
            </div>
          </div>
      </a><!--  Reportes-->

      <a href="user.php" class="pnl card col m4 s12 l4 offset-m2 offset-l2">
                  <div class="row up-space">
            <div class="col m12 s12 center-align">
              <i class="  medium mdi-action-face-unlock"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12">
              <h4 class="center-align" >Usuarios</h4>
            </div>
          </div>
      </a><!--  Usuarios-->
    </div>

  </div><!--  Contenedor-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
