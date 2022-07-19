<?php
	class controllerAutenticarUsuario
	{
		public function validarUsuario($correo,$password)	
		{
			include_once('../model/Usuario.php');
			$obUsuario = new usuario;	
			$respuesta = $obUsuario -> validarSoloUsuario($correo);
			if($respuesta == 1)
			{
					$respuesta = $obUsuario -> validarUsuarioPassword($correo,$password);
					if($respuesta == 1)
					{
							$respuesta = $obUsuario -> validarEstadoUsuario($correo);
							if($respuesta == 1)
							{
                                include_once('../model/usuario.php');
                                $usuarioobj = new usuario;
                                $usuario = $usuarioobj->obtenerUsuarioPorCorreo($correo);
								$this->crearSesion($usuario);
								include_once('../index.php');							
							}
							else
							{
								include_once('../formShared/formResult.php');
								$objformMensaje = new formResult;
								$objformMensaje -> formResultShow("Error ","El usuario esta deshabilitado, por favor <strong>contacte con el administrador </strong>","../index.php");
							}
					}
					else
					{
						include_once('../formShared/formResult.php');
						$objformMensaje = new formResult;
						$objformMensaje -> formResultShow("Error ","El password del usuario no es correcto <strong>intente nuevamente</strong>","../index.php");	
					}
			}
			else
			{
				include_once('../formShared/formResult.php');
				$objformMensaje = new formResult;
				$objformMensaje -> formResultShow("Error","No se encontró el usuario <strong>intente nuevamente </strong>","../index.php");	
			}
		}

	public function crearSesion($usuarios){
		error_reporting(0);
		session_start();
			foreach($usuarios as $usuario){
				$_SESSION['id'] = $usuario['usu_iCodigo'];
				$_SESSION['nombre']=$usuario['usu_vcNombre']." ".$usuario['usu_vcApellidoPat'];
				$_SESSION['estado']=$usuario['usu_iEstado'];
				$_SESSION['modo']=$usuario['usu_iModo'];
			}
		}
	}
?>