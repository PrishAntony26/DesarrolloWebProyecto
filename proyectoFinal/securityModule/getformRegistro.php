<?php

    $boton = $_POST['btnRegister'];
    if(isset($boton)){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario= $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $sexo = $_POST['sexo'];
        $email = $_POST['correo'];
        $telefono = $_POST['telefono'];
        print("el usuario es: ".$usuario);
        //Realizar las validaciones correspondientes de los campos 
        //Validar que el correo no coincida con los demas correos.
        //Validar que la contraseña tenga mas de 6 caracteres etc. 
        $contrasenia = md5($contrasenia); //Hasheo de la contrasenia
        include_once('../Model/usuario.php');
        $usuarioobj = new usuario();
        $usuarioobj->registrarUsuario($nombre,$apellido,$usuario,$contrasenia,$sexo,$email,$telefono);
        include_once('../formShared/formResult.php');
        //Asignar los privilegios correspondientes (Modo usuario)
        $id= $usuarioobj->obtenerUsuarioPorCorreo($email);
        //Registramos los privilegios del usuario. 
        include_once('../Model/detalleprivilegio.php');
        $detallepriv = new detalleprivilegio();
        $detallepriv->asignarPrivilegio($id);
        //Mostramos el formulario de exito.
        $formResultobj = new formResult();
        $formResultobj->formResultShow("Registro de usuario","Usuario registrado correctamente",
                                    "../index.php");
    }
?>