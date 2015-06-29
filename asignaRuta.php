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
<?php include 'navegacion.php'; ?>
<?php 
  $id_user=$_GET['id_user']; 
  include("php/conexion.php");
  $link=Conectarse();
  $rutas=mysql_query("SELECT * FROM rutas");
  $totrutas=mysql_num_rows($rutas);
  $a=$totrutas/4;
  $ci=round($a);
?>
<div class="backline be-blue"></div>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12 card paddin-largo">
        <div class="row">
          <h4 class="center-align">Asignar Ruta</h4>
        </div>
        <div class="row">
          <form action="asignaRuta.php" method="POST">
            <div class="row">
              <div class="input-field col s10 m10 l10  offset-s1 offset-m1 offset-l1  ">
               <?php 

               for ($i=0; $i <$ci ; $i++) { 
                echo '<div class="row">';
                  for ($j=0; $j <3 ; $j++) { 
                      while ($row = mysql_fetch_row($rutas)){
                        echo '

                        <div class="col s6 m4 l4">
                          <p>
                              <input name="ruta" type="radio" id="'.$row[2].'" value="'.$row[0].'" checked/>
                              <label for="'.$row[2].'">'.$row[2].'</label>
                          </p>
                        </div>';

                      }
                  }
                  }
                  echo '<input type="hidden" name="id_user" value="'.$id_user.'" >';
               ?>
              </div><div class="row"></div>
              <div class="row">
                <div class="center">
                  <input type="submit" class="btn" value="Asignar">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php 
    if (isset($_POST['ruta'])) {
    $ruta=trim($_POST['ruta']); 
    $user=trim($_POST['id_user']);

    }
   ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
