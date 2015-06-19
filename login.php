<?php 
	session_start();

	$user=$_POST['usuario'];
	$pwd=$_POST['password'];

	include 'php/conexion.php';
	$link=Conectarse();
    $con=mysql_query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$pwd' ",$link);

	if($resultado = mysql_fetch_array($con)){
		$_SESSION['u_user']=$user;
		$_SESSION['u_id']=$resultado[0];
		$_SESSION['u_tipo']=$resultado[3];
		if($_SESSION['u_tipo']==1){
			header("Location: dashboard.php");
		echo "sesion iniciada";
		}
		else{
			header("Location: seller/home.php");
		}

	}else{
		header("Location: index.php");
	}


 ?>
