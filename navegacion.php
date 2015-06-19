<?php
$a='class=""';
$b='class=""';
$seccion="";
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
   $seccion = "Rutas";
   break;
     case "productos.php":
   $seccion = "Productos";
   break;
     case "user.php":
   $seccion = "Usuarios";
   break;
     case "documentos.php":
   $seccion = "Documentos";
   break;    case "nuevaCarga.php":
   $seccion = "Cargando Ruta";
   break;
 }
 ?>

<nav class="be-blue">
    <div class="nav-wrapper rigth-space">
      <a href="#" data-activates="mobile-demo" class="button-collapse left-space"><i class="mdi-navigation-apps small"></i></a>
            <a href="#" class="brand-logo center"><?php echo $seccion; ?></a>
      <ul class="azul right hide-on-med-and-down">
      	<li <?php echo $a; ?>><a href="dashboard.php">Panel de Control <i class="mdi-action-settings small left"></i></a></li>
        <li <?php echo $b; ?>><a href="cargas.php">Cargas <i class="mdi-action-add-shopping-cart small left"></i></a></li>
        <li><a href="logout.php">Cerrar Sesion <i class="mdi-action-exit-to-app small left"></i></a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
  	<li class=""><a href="dashboard.php">Panel de Control<i class="mdi-action-settings small left"></i></a></li>
        <li class=""><a href="cargas.php">Cargas<i class="mdi-action-add-shopping-cart small left"></i></a></li>
        <li><a href="logout.php">Cerrar Sesion <i class="mdi-action-exit-to-app small left"></i></a></li>
      </ul>
    </div>
</nav>
          