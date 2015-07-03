 <?php 
  if(isset($_POST['user']))
    {
    $usr=trim($_POST['user']);
    $pass=trim($_POST['psw']);
    $psw=md5($pass);
    $tipo=0;
    $insertar="INSERT INTO `harina`.`usuarios` (`id_user`, `usuario`, `password`, `tipo`) VALUES (NULL, '$usr', '$psw', '$tipo');";
        mysql_query($insertar)or die(mysql_error());
	}
	header("Location: user.php");
   ?>