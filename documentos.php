<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Docmentos</title>

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

      </div>
      <h3 class="center-align">Lista de Documentos</h3>
      <?php 
        include("php/conexion.php");
        $link=Conectarse();
        $constula=mysql_query("SELECT * FROM documentos ",$link);
        echo '<table>
              <thead>
                <tr>
                    <th data-field="id">Documento</th>
                    <th data-field="name">Fecha</th>
                    <th data-field="price">Ruta</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($constula)){
          echo '<tr>
            <td>'.$row[2].'</td>
            <td>'.$row[1].'</td>
            <td>'.$row[3].'</td>
            <td>Ver</td>
            <td>Edit</td>
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
