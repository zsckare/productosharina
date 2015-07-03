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
            <h3 class="center-align">Consultar Carga</h3>
   
    <div class="row">
        <form action="cargas.php" method="post">
          <div class="row">
            <div class="input-field col s2 m2 l2 offset-s2 offset-m2 offset-l2">
              <label for="ia">Selecionar  Fecha</label>
               <input type="date" class="datepicker" name="fecha">
            </div>
            <div class="input-field col s4 m4 l4">
             <select name="ruta" class="browser-default">
              <option value="" disabled selected>Seleccione una Ruta</option>
            <?php 
            $ruta="";
   include("php/conexion.php");
            $linkS=Conectarse();
            $queryConsulta="SELECT * FROM rutas order by id_ruta asc";
            $result = mysql_query($queryConsulta);
            while($campo=mysql_fetch_array($result)){
              echo "<option value='".$campo['id_ruta']."'> ".$campo['nom_ruta']." </option>";
            }
             ?>
            </select>
            </div>
            <div class="input-field col s2 m2 l2">
              <input type="submit" class="btn-large " style="margin-top:-.2em;" value="Ver Carga">
            </div>
          </div>
        </form>
  
    </div><!--Formulario-->

    <div class="row">
      <?php 
      $nombreprodcuto="";
        if (isset($_POST['ruta'])) {
          $ruta=trim($_POST['ruta']);
          $fecha=date("Y-m-d", strtotime($_POST['fecha']));

        }

      ?>
  <div class="col s6 m6 l6">
    <table>
                 <thead>
                    <tr>
                        <th data-field="id">nombre</th>
                        <th data-field="name">se llevo</th>
                    </tr>
                  </thead>

                  <tbody>
                <?php 
                $link=Conectarse();
                $reg=mysql_query("SELECT * FROM movimientos WHERE id_ruta='$ruta' AND tipo=0 ORDER BY id_producto ASC ",$link);
                while ($rs = mysql_fetch_row($reg)){
                  $ids=trim($rs[1]);
                  $name=mysql_query("SELECT * FROM productos WHERE id_producto='$ids' ",$link);
                  if ($rows = mysql_fetch_row($name)) {
                    $nombreprodcuto = trim($rows[2]);
                    }
                    
                  
                echo '<tr>
                    <td>'.$nombreprodcuto.'</td>
                    <td>'.$rs[3].'</td>
                  </tr>';

                }
                
                 ?>
                  </tbody>
            </table>
  </div>
<div class="col s6 m6 l6">
  <table>
                 <thead>
                    <tr>
                        <th data-field="id">nombre</th>
                        <th data-field="name">regreso</th>
                    </tr>
                  </thead>

                  <tbody>
                <?php 
                $consulta="SELECT * FROM movimientos WHERE id_ruta='$ruta' AND tipo =1 ORDER BY id_producto ASC";
                $res=mysql_query($consulta);
                while ($rowa=mysql_fetch_row($res)) {
                    $id=trim($rowa[1]);
                    
                  $name=mysql_query("SELECT * FROM productos WHERE id_producto='$id' ",$link);
                  if ($rows = mysql_fetch_row($name)) {
                    $nombreprodcuto = trim($rows[2]);
                    }
                  echo '<tr>
                  <td>'.$nombreprodcuto.'</td>
                  <td>'.$rowa[4].'</td>
                  </tr>';
            

                }
        

                 ?>
                  </tbody>
            </table>
</div>

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
