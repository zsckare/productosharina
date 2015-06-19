<?php 


    if(isset($_POST['nombre']))
    {

      $nombre=trim($_POST['nombre']);
      $codigo=trim($_POST['codigo']);
      $precio=trim($_POST['precio']);
      $idprod=trim($_POST['id']);


        include("php/conexion.php");
        $link=Conectarse();
        $insertar="UPDATE `harina`.`productos` SET `codigoproducto` = '$codigo', `nombre` = '$nombre', `precio` = '$precio' WHERE `productos`.`id_producto` ='$idprod' ";
        mysql_query($insertar)or die(mysql_error());
        echo '<script type="text/javascript">alert("REGISTRADO :)");</script>';
		header("Location: productos.php");
  } 
?>