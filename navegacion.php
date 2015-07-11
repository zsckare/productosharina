<?php
$a='class=""';
$b='class=""';
$seccion="";
$addmenu="";
$archivo_actual = basename($_SERVER['PHP_SELF']); //Regresa el nombre del archivo actual

switch($archivo_actual) //Valido en que archivo estoy para generar mi CSS de selección
 {
   case "dashboard.php":
   $a = 'class="activo"';
   break;
   case "cargas.php":
   $b = ' class="activo"';
   break;
  case "rutas.php":
 
   $addmenu='<li class="activo" ><a href="rutas.php">Rutas<i class="mdi-maps-local-shipping small left"></i></a></li>';
  
   break;
     case "productos.php":
   $seccion = "Productos";
   break;
    case "user.php":
   $seccion = "Usuarios";
   break;
     case "documentos.php":
   $seccion = "Hojas de Carga";
   break;   

   case "verDcto.php":
    $addmenu='<li class="activo" ><a href="documentos.php">Documentos<i class="mdi-editor-insert-drive-file small left"></i></a></li>';
   break;
   case "nuevoProducto.php":
    $addmenu='<li class="activo" ><a href="productos.php">Productos<i class="mdi-action-shopping-basket small left"></i></a></li>';
   break;

   case "nuevaCarga.php":
   $seccion = "Cargando Ruta";
   break;
 }
 ?>

<nav class="be-blue">
    <div class="nav-wrapper rigth-space">
      <a href="#" data-activates="mobile-demo" class="button-collapse left-space"><i class="mdi-navigation-apps small"></i></a>
      <a href="#" class="brand-logo center"><?php echo $seccion; ?></a>
      <ul class="azul right hide-on-med-and-down ">
      	<li <?php echo $a; ?>><a href="dashboard.php">Panel de Control <i class="mdi-action-settings left"></i></a></li>
        <?php echo $addmenu;?>
        <li><a href="logout.php">Cerrar Sesion <i class="mdi-action-exit-to-app left"></i></a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
  	    <li <?php echo $a; ?>><a href="dashboard.php">Panel de Control <i class="mdi-action-settings small left"></i></a></li>
        <?php echo $addmenu;?>
        <li><a href="logout.php">Cerrar Sesion <i class="mdi-action-exit-to-app small left"></i></a></li>
      </ul>
    </div>
</nav>
          