<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Harina.dev</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class=" gray-blue">

<div class="backlines be-blue"></div>
	<div class="container ">
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
			<form action="login.php" class="card center-align col m6 s12 offset-m3 paddin-largo" method="post">
				<div class="row"></div>
					<div class="row">
			        <div class="input-field col s12 m12">
			          <i class="mdi-action-account-circle prefix"></i>
			          <input id="icon_prefix" type="text" class="validate" name="usuario">
			          <label for="icon_prefix">Usuario</label>
			        </div>
			      </div>
			      <div class="row">
			      	
			        <div class="input-field col s12 m12">
			          <i class="mdi-communication-vpn-key prefix"></i>
			          <input id="icon_telephone" type="password" class="validate" name="password">
			          <label for="icon_telephone">Contraseña</label>
			        </div>
			      </div>
			      <div class="row">
			      	<input class="light-blue darken-4 btn" type="submit" value="Entrar" >
			      </div>
			</form>
		</div>
	</div>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
