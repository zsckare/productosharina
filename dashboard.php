    <?php 
    session_start();
    if($_SESSION['u_tipo']==1){

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
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="gray-blue">

<?php include ('navegacion.php'); ?>
<div class="backline be-blue"></div>
  <div class="container ">
    <div class="row" style="margin-top:1.2em;">
      <a id="rutas" href="rutas.php" class="pnl card col m4 s12 l4 offset-m1 offset-l1 be-blue-letras hoverable">
          <div class="row ">
            <div class="col m12 s12 l12 center-align ">
              <i class="medium  mdi-maps-local-shipping"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <h4 class="center-align" >Rutas</h4>
            </div>
          </div>
      </a><!--  Rutas-->

      <a id="productos" href="productos.php" class="pnl card col m4 s12 l4 offset-m1 offset-l2 be-blue-letras">
          <div class="row ">
            <div class="col m12 s12 l12 center-align ">
              <i class="medium  mdi-action-shopping-basket"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <h4 class="center-align" >Productos</h4>
            </div>
          </div>
      </a><!--  Productoss-->
    </div>

    
        <div class="row">
      <a id="documento" href="documentos.php"  class=" pnl card col m4 s12 l4 offset-m1 offset-l1 be-blue-letras">
          <div class="row up-space">
            <div class="col m12 s12 l12 center-align ">
              <i class=" medium ion-folder"></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <h4 class="center-align" >Documentos</h4>
            </div>
          </div>
      </a><!--  Reportes-->

      <a href="hojas.php" class="pnl card col m4 s12 l4 offset-m1 offset-l2 be-blue-letras">
                  <div class="row up-space">
            <div class="col m12 s12 l12 center-align">
              <i class="  medium ion-document "></i>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12">
              <h4 class="center-align" >Hojas</h4>
            </div>
          </div>
      </a><!--  Usuarios-->
    </div>

  </div><!--  Contenedor-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script >
  if (window.navigator && window.navigator.vibrate) {
    document.querySelector("#rutas").addEventListener("click", function () {
        navigator.vibrate(200);
    }, false);
    document.querySelector("#productos").addEventListener("click", function () {
        navigator.vibrate([200, 100, 200, 100]);
   }, false);
   document.querySelector("#documento").addEventListener("click", function () {
       navigator.vibrate(200);
   }, false);
   document.querySelector("#vibrar-off").addEventListener("click", function () {
        navigator.vibrate(0);
    }, false);
}
else {
   alert("Tu dispositivo no soporta la API de vibración");
}</script>
  </body>
</html>
