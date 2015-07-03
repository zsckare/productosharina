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
<div class="row">
<div class="col s12 m12 l12">
        <div class="card paddin-largo" >

      <h3 class="center-align">Lista de Documentos</h3>
      <div class="row"id="documentos">
        <?php 
        include("php/conexion.php");
        $link=Conectarse();
        $constula=mysql_query("SELECT * FROM documentos WHERE visible=0 ORDER BY hora DESC ",$link);
        echo '<table>
              <thead>
                <tr>
                    <th data-field="id">Fecha</th>
                    <th data-field="name">Ruta</th>
                    <th data-field=""></th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($constula)){
          echo '<tr>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
            <td></td>
            <td><a class="botnnva" href="verDcto.php?id_dcto='.$row[0].'" style="padding:.3em 1.2em !important;" >Ver</a></td>

          </tr>';
        }
        echo '</tbody>
      </table>';
       ?>

      </div>
    </div>
</div>
</div>
  </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
