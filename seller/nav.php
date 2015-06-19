<?php 
$a="";
$b='class="act"';
$archivo_actual = basename($_SERVER['PHP_SELF']); 

switch($archivo_actual) //Valido en que archivo estoy para generar mi CSS de selección
 {
   case "home.php":
   $a = "Bienvenido ".$username; 
   $b = 'style="background-color: #03a9f4 !important;"';
   break;

 }
 ?>
 
<nav class="be-blue">
	<div class="nav-wrapper rigth-space">
	<a href="#" data-activates="mobile-demo" class="button-collapse left-space"><i class="mdi-navigation-apps small"></i></a>
      
		<a class="left-space"><?php echo $a; ?></a>
		<ul class="azul right hide-on-med-and-down">
		<li <?php echo $b; ?> ><a href="home.php">Inicio <i class="mdi-action-settings small left"></i></a></li>
		<li><a href="../logout.php">Cerrar Sesion <i class="mdi-action-exit-to-app small left"></i></a></li>

		</ul>
	</div>
</nav>