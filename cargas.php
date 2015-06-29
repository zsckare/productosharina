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
<div class="row">
  <div class="col s12 m12 l12">
        <div class="card paddin-largo">
      <div class="row">
  
        
    
      <div class="col s6 m9 l9 offset-s1">
        <div class="row">
       
            <h3 class="center-align">Lista de Cargas</h3>

        </div>
      </div>
      <div class="col s4 m2 l2">
        <a href="#new" class="botnnva modal-trigger medium-letter" ><span>Nueva Carga</span></a>
      </div>
    </div>
    <div class="row">
            <?php 
      
        include("php/conexion.php");
        $link=Conectarse();
        $constula=mysql_query("SELECT * FROM rutas ",$link);
        echo '<table class="col s12 m12 l12" >
              <thead>
                <tr>
                    <th data-field="id">Nombre</th>
                    <th data-field="name">Codigo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>';
        while ($row = mysql_fetch_row($constula)){
          echo '<tr>
            <td>'.$row[2].'</td>
            <td>'.$row[1].'</td>
            <td></td>
            <td><a class="botncar" href="verCarga.php?id_ruta='.$row[0].'"'.'>Ver Carga</a></td>
            <td><a class="botnret" href="revisarCargas.php?id_ruta='.$row[0].'"'.'>Llegada</a></td>
            <td><a class="botnnva" href="revisar.php?idruta='.$row[0].'"'.'>Revisar</a></td>
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

  <div id="new" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Seleccionar Ruta</h4>
      <div class="row">              
            <?php 

            $linkS=Conectarse();
            $queryConsulta="SELECT * FROM rutas order by id_ruta asc";
            $result = mysql_query($queryConsulta,$linkS);
            $totalderutas=mysql_num_rows($result);
            $n=$totalderutas/3;
            $c=round($n);

            for ($p=0; $p <$c ; $p++) { 
              echo '<div class="row">';
                for ($o=0; $o <=2 ; $o++) { 
                  $campo=mysql_fetch_array($result);
                      
                      if ($p==$c) {
                        
                      }else{
                      echo '<div class="col s4 m4 l4">';
                      echo '
                      <form action="nuevaCarga.php" class="center" method="get ">
                        <input type="hidden" name="categoria" value="'.$campo['id_ruta'].'">

                        <input type="submit" class="btn light-blue darken-4" value="'.$campo['nom_ruta'].'">
                      </form>
                      </div>
                      
                      ';
                      }
                      
                    
                }
              echo "</div>";
              echo '<div class="row"></div>';
            }
            
             ?>
            
      </div>
    </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
