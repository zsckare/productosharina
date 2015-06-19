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
    <?php 
    session_start();
    if(isset($_SESSION['u_user'])){

    }
    else{
      header("Location: index.php");
    }
  ?>
<?php include 'navegacion.php'; ?>

<div class="backline be-blue"></div>
<?php 
 $idprod=$_GET['idproducto']; 
  include("php/conexion.php");
  $link=Conectarse();
  $constula=mysql_query("SELECT * FROM productos WHERE id_producto='$idprod' ",$link);
  while ($row = mysql_fetch_row($constula)){
 ?>

  <div class="container espacio-arriba ">
  <div class="card paddin-largo">
      <div class="row">
    <div class=" col s12 m12 l12 ">
      <div class="row">
        <div class="col s6 m6 l2">
          <a href="productos.php" class="btn-floating btn-large waves-effect waves-light azul-claro" style="margin-top:.5em;"><i class="mdi-navigation-arrow-back"></i></a>
     </div>
      <div class="col s6 m6 l8">
         <h4 class="center-align">Editar Producto</h4></div>
      </div>
    </div>
  </div>

<div class="row">
        <form action="editProducto.php" method="POST" class="center-align" enctype="multipart/form-data">
       <?php echo '<input type="hidden" name="id" value='.$row[0].'>'; ?>

          <div class="row ">
            <div class="center-align">
                <div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
                <label for="ap" >Nombre del Producto</label>
                <input id="ap" type="text" name="nombre" value="<?php echo $row[2] ?>">
              </div>
            </div>          
          </div>
          <div class="row ">
            <div class="center-align">
                <div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
                <label for="ap" >Codigo del Producto</label>
                <input id="ap" type="text" name="codigo" value="<?php echo $row[1] ?>">
              </div>
            </div>          
          </div>
            <div class="row ">
            <div class="center-align">
                <div class="input-field col m8 s10 l8 offset-l2 offset-s1 offset-m2">
                <label for="ap" >Precio del Producto</label>
                <input id="ap" type="text" name="precio"  value="<?php echo $row[3] ?>">
              </div>
            </div>          
          </div>


          

          <div class="row">
            <div class="center">
              <input class="light-blue darken-4 btn " type="submit" value="Actualizar">
            </div>  
          </div>
        </form>
      </div>

  </div>
  </div><!--  Contenedor-->
<?php } ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
