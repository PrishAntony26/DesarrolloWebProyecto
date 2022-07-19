<?php
//getAutenticarUsuario.php
	function validarCampos($login,$password)
	{//Implementar TODAS LAS validaciones correspondientes
		if(strlen($login)>=4 && strlen($password)>=2)
			return(1);
		else
			return(0);	
	}


	$boton = $_POST['btnLogin'];
	if(isset($boton))
	{
		$correo = strtolower(trim($_POST['email']));
		$password = trim($_POST['contrasenia']);
		$resultado = validarCampos($correo,$password);
		if($resultado == 1)
		{
			$password = md5($password);
			include_once('controllerAutenticarUsuario.php');
			$objControllerAutenticarusuario = new controllerAutenticarUsuario;
			$objControllerAutenticarusuario -> validarUsuario($correo,$password);	
		}
		else
		{
			include_once('../formShared/formResult.php');
			$objformMensaje = new formResult;
			$objformMensaje -> formResultShow("Error","No se encontró el usuario <strong>intente nuevamente </strong>","../index.php");
		}
	}
	else
	{
		include_once('../formShared/formResult.php');
		$objformMensaje = new formResult;
		$objformMensaje -> formResultShow("Error","No se encontró el usuario <strong>intente nuevamente </strong>","../index.php");
	}
?>