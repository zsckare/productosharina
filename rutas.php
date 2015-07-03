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
      <h3 class="center-align">Lista de Rutas</h3>
      <?php 
        include("php/conexion.php");
        $link=Conectarse();
        $constula=mysql_query("SELECT * FROM rutas ",$link);
        echo '<table class="striped">
              <thead>
                <tr>
                    <th data-field="id">Nombre</th>
                    <th data-field="name"></th>
                    
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($constula)){
          echo '<tr>
            <td>'.$row[2].'</td>

            <td><a class="botncar" href="addProductos2.php?idruta='.$row[0].'"'.'>Nueva Carga</a></td>
            <td><a class="botnret" href="addReturn.php?idruta='.$row[0].'"'.'>Regreso</a></td>
            
          </tr>';
        }
        echo '</tbody>
      </table>';
       ?>
    </div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
