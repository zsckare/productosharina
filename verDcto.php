<?php 
include("php/conexion.php");
$link=Conectarse();
$id_dcto=$_GET['id_dcto'];

$result=mysql_query("SELECT * FROM documentos WHERE id_dcto='$id_dcto' ");
$row=mysql_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Ver Dcto<?php echo " ".$row[0]; ?></title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="gray-blue">
  <?php include 'navegacion.php'; ?>
  <?php 
  $nombreruta="";
  $idruta=$row[2];
  $cons=mysql_query("SELECT nom_ruta FROM rutas WHERE id_ruta='$idruta' ");
  $fila=mysql_fetch_row($cons);
  $nombreruta=$fila[0];
  $rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos WHERE id_ruta='$idruta' ");
  if ($rowa = mysql_fetch_row($rs)) {
    $id_dcto = trim($rowa [0]);
  }
  $precioproducto[0]="";
  $ppp=0;
  $productosgnral=mysql_query("SELECT * FROM productos ORDER BY id_producto");
  while ($pp=mysql_fetch_row($productosgnral)) {
    $precioproducto[$ppp]=$pp[4];
    $ppp++;
  }



  ?>
  <div class="backline be-blue"></div>
  <div class="container">
    <div class="row">
      <div class="col s12 l12 m12">
        <div class="card paddin-largo">
          <div class="row"><h4 class="center-align">Documento <?php echo " #".$row[0]; ?></h4></div>
          <div class="row encabezado">
            <div class="col s9 m3 l5">
              <h5 class="center-align ">Fecha:<?php echo " ".$row[1]; ?></h5>
            </div>
            <div class="col s3 m3 l3 o offset-m6 offset-l4">
              <h5 class="center-align"><?php echo $nombreruta; ?></h5>
            </div>
          </div><!-- encabezado-->

          <div class="row">
            <div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header gray-blue"><span class=""><strong>Subtotal Ventas</strong></span>
                    <span class="espacio-der" ><?php echo "$ ".$row[7]; ?></span>
                  </div>
                  <div class="collapsible-body">
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
                          $reg=mysql_query("SELECT * FROM movimientos WHERE id_ruta='$idruta' AND tipo=0 AND id_dcto='$id_dcto' ORDER BY id_producto ASC ");
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
                      $consulta="SELECT * FROM movimientos WHERE id_ruta='$idruta' AND tipo =1 AND id_dcto='$id_dcto' ORDER BY id_producto ASC";
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
        </li>
        <li>
          <div class="collapsible-header"><span><strong>Total de Gastos</strong></span><span style="margin-left:15.3em;" ><?php echo "$ ".$row[4]; ?></span> </div>
          <div class="collapsible-body">
            <table>
              <thead>                 
               <tr>
                <th data-field="id">Concepto</th>
                <th data-field="name">Monto</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $ex=mysql_query("SELECT * FROM extras WHERE id_dcto='$id_dcto' ");
              $gasto=mysql_fetch_row($ex);
              ?>
              <tr>
              <td>Promociones</td><td><?php echo  "$ ".$gasto[2];  ?></td>
              </tr>
              <tr>
              <td>Gasolina</td><td><?php echo  "$ ".$gasto[3];  ?></td>
              </tr>
              <tr>
              <td>Viaticos</td><td><?php echo  "$ ".$gasto[4];  ?></td>
              </tr>
              <tr>
              <td>Lavado</td><td><?php echo  "$ ".$gasto[5];  ?></td>
              </tr>
              <tr>
              <td>Otros Gastos</td><td><?php echo  "$ ".$gasto[6];  ?></td>
              </tr>

            </tbody>
          </table>
        </div>
      </li>

      <li>
        <div class="collapsible-header gray-blue"><span>Notas a Credito</span><span style="margin-left:15.5em;"><?php echo "$ ".$row[5]; ?></span></div>
        <div class="collapsible-body"></div>
      </li>
      <li>
        <div class="collapsible-header" id="totalfinal">
          <span class="totales">Gran Total</span><span class="totales" style="margin-left:18em;" ><?php echo "$".$row[3]; ?></span>
        </div>
      </li>
    </ul>
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
