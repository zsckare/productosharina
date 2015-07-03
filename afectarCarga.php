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

<?php 
date_default_timezone_set("America/Mexico_City");
  # en este archivo afectar la carga de la ruta asignada
  # ademas se afectara el documento asignado modificando el total de venta
  # de diho documento
  #
  $ruta="";
  $id_dcto="";
  if (isset($_POST['ruta'])) {
    $ruta=$_POST['ruta'];
  }
  else{
    $ruta=$_GET['ruta'];
  }
  include ('php/conexion.php');
  $link=Conectarse(); 
    $rs = mysql_query("SELECT MAX(id_dcto) AS id FROM documentos WHERE id_ruta = '$ruta' ",$link);
  if ($row = mysql_fetch_row($rs)) {
  $id_dcto = trim($row[0]);
  }
  $sub=trim($_POST['subtotal']);
  $totventa="";
  $hoy=date("Y-m-d");
  $sql="UPDATE documentos SET `totventa` = '$totventa' WHERE `id_dcto` = '$id_dcto' ";
  #aqui agregare el dinero que le falte al vendedor a la tabla de extras
  $faltante=$_POST['faltante'];
  $fal=mysql_query("UPDATE extras SET `faltante` = '$faltante' WHERE `id_dcto` = '$id_dcto' ");

?>
    <div class="container">
      <div class="card">
    <?php 
    $carga[0]="";
    $devolucion[0]="";
    $totproductos[0]="";
    $id_producto[0]="";
    $i=0;
    $j=0;

      $reg=mysql_query("SELECT * FROM cargas WHERE ir_ruta='$ruta' ORDER BY id_producto ASC ");
      while ($row=mysql_fetch_row($reg)) {
        $id_producto[$i]=$row[2];
        $carga[$i]=$row[3];
        $i++;
      }

 # echo '<pre>';
 # #print_r($carga);
 # echo '</pre>';
#echo "-----------------------------------------";
      /*
      $consulta=mysql_query("SELECT * FROM movimientos WHERE tipo=1 AND id_ruta='$ruta' ORDER BY id_producto ASC");
      while ($rs=mysql_fetch_row($consulta)) {
        $devolucion[$j]=$rs[4];
        $j++;
      }*/
      $consulta=mysql_query("SELECT * FROM devoluciones WHERE id_ruta='$ruta' ORDER BY id_producto ASC");
      while ($rs=mysql_fetch_row($consulta)) {
        $devolucion[$j]=$rs[3];
        $j++;
      }
  #echo '<pre>';
  #print_r($devolucion);
  #echo '</pre>';

#echo "-----------------------------------------";

    $max=sizeof($carga);
    $restante[0]="";
    for ($k=0; $k <$max ; $k++) { 
      if($devolucion[$k]==0){
        $restante[$k]=0;
      }else{
      $restante[$k]=$devolucion[$k];
    }
      
    }

  #echo '<pre>';
  #print_r($restante);
  #echo '</pre>';
    #en el for voy actulizadno uno por uno la existencia restanteen la carga
    for ($l=0; $l <$max ; $l++) { 
     
     $actualizar="UPDATE cargas SET existencia = $restante[$l] WHERE ir_ruta = '$ruta' AND id_producto ='$id_producto[$l]' ";
     mysql_query($actualizar)or die(mysql_error());
#echo '<script type="text/javascript">console.log("actualizadp :)");</script>';
    }
    #AQUI acumulare los gastos que haya tenido el vendedor 
    $gastos="";
    $gstos=mysql_query("SELECT * FROM extras WHERE id_dcto='$id_dcto'");
    $r=mysql_fetch_row($gstos);
    $promo=$r[2]; 
    $gasolina=$r[3];
    $viaticos=$r[4];
    $lavado=$r[5];
    $otros=$r[6];
    $gastos=$promo+$gasolina+$viaticos+$lavado+$otros;
    $actulizargastos=mysql_query("UPDATE documentos SET totgastos ='$gastos' WHERE id_dcto='$id_dcto' ");

  #$actualizar="UPDATE cargas SET existencia = $restante WHERE id_ruta = '$ruta' id_producto ='$id_producto'";
    $actdcto=mysql_query("SELECT * FROM documentos WHERE id_dcto = '$id_dcto' ");
    $totgastos="";
    $totnotas="";
    $grantotal=0;
    $fila=mysql_fetch_row($actdcto);
    $totnotas=$fila[5];
    $totgastos=$fila[4];
    $gastosnega=$totgastos+$totnotas;
    $algo=$sub-$gastosnega;
    $grantotal=$algo;

    $updatedcto=mysql_query("UPDATE documentos SET totventa=$grantotal, subtotal = $sub WHERE id_dcto = '$id_dcto' AND fecha = '$hoy' " );

    //--------------------Vaciar tabla de devoluciones-----------
    $del=mysql_query("DELETE FROM devoluciones WHERE id_ruta='$ruta' ");
    header("Location: dashboard.php");

     ?>

    </div>

    </div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
