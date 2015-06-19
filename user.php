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
<div class="backline be-blue"></div>
  <div class="container">
    <div class="card paddin-largo">
      <div class="row">

 
      <h3 class="center-align">Usuarios</h3>
      <?php 
      echo '<a href="#new" class="col m2 offset-m10 modal-trigger">Registrar Usuario</a>';
        include("php/conexion.php");
        $link=Conectarse();
        $constula=mysql_query("SELECT * FROM usuarios ",$link);
        echo '<table>
              <thead>
                <tr>
                    <th data-field="id">Nombre del Usuario</th>
                    
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($constula)){
          echo '<tr>
            
            <td>'.$row[1].'</td>
          </tr>';
        }
        echo '</tbody>
      </table>';
       ?>
            </div>
    </div>
  </div>
  <div id="new" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Nuevo Usuario</h4>
      <div class="row">
        <form action="user.php" method="POST">
          <div class="row">
            <div class="input-field col m4">
              <input type="text" name="user" placeholder="Usuario">
            </div>
          </div>
          <div class="row">
            <div class="input-field col m4">
              <input type="password" name="psw" placeholder="Contraseña">
            </div>
          </div>
          <div class="row">
          <div class="center">
            <input type="submit" class="btn-large light-blue darken-4" value="Registrar">
          </div>       
          
          </div>
        </form>
      </div>
    </div>

  </div>
  <?php 
  if(isset($_POST['user']))
    {
    $usr=trim($_POST['user']);
    $pass=trim($_POST['psw']);
    $psw=md5($pass);
    $tipo=0;
    $insertar="INSERT INTO `harina`.`usuarios` (`id_user`, `usuario`, `password`, `tipo`) VALUES (NULL, '$usr', '$psw', '$tipo');";
        mysql_query($insertar)or die(mysql_error());
}
   ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
