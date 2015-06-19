    <?php 
    session_start();
    if(isset($_SESSION['u_user'])){

    }
    else{
      header("Location: index.php");
    }
  ?>
  <?php 
 $idprod=$_GET['idproducto']; 
  include("php/conexion.php");
  $link=Conectarse();
  $consulta="DELETE FROM productos WHERE id_producto='$idprod' ";
  mysql_query($consulta,$link);
  	
  	header("Location: productos.php")
 ?>