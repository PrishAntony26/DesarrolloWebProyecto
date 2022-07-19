<?php
    include_once('conexionSingleton.php');
    class usuario
    {
        private $con=null;
    
        public function __construct(){
            $this->con = conexionSingleton::obtenerInstancia();
        }
        public function listarUsuario()
        {
            $consulta = "SELECT * FROM usuario";
            $resultado = $this->con->obtener_data($consulta);
            return $resultado;
        }
    
        public function registrarUsuario($nombre,$apellido,$usuario,
                                        $contrasenia,$sexo,$email,$telefono)
        {
            $consulta = "INSERT INTO usuario (usu_vcUsuario,usu_vcContrasenia, 
            usu_vcNombre,usu_vcApellidoPat,usu_vcSexo,usu_vcCorreo, 
            usu_iTelefono,usu_iEstado,usu_iModo) 
            VALUES ('$usuario','$contrasenia','$nombre','$apellido','$sexo',
            '$email','$telefono',1,1)";
            return $this->con->ejecutarConsulta($consulta);
        }

        public function editarUsuario($stock,$id)
        {
            $consulta = "UPDATE producto SET stock = '$stock' WHERE idProducto = '$id'";
            return $this->con->ejecutarConsulta($consulta);
        }

        public function eliminarUsuario($id)
        {
            $consulta = "DELETE FROM producto WHERE idProducto='$id'";
            return $this->con->ejecutarConsulta($consulta);
        }

        public function obtenerUsuarioPorCorreo($correo)
        {
            $consulta = "SELECT * FROM usuario WHERE usu_vcCorreo = '$correo'";
            $usuario =$this->con->obtener_data($consulta);
            return $usuario;
        }

        public function validarSoloUsuario($correo)
		{
			$consulta = "Select * from usuario where usu_vcCorreo = '$correo' ";
			$numData = $this->con->obtener_numData($consulta);
            return $numData;
		}
		
		public function validarUsuarioPassword($correo,$password)
		{
			$consulta = "Select * from usuario where usu_vcCorreo = '$correo' AND usu_vcContrasenia = '$password' ";
			$numData = $this->con->obtener_numData($consulta);
            return $numData;
		}
		
		public function validarEstadoUsuario($correo)
		{
			$consulta = "Select * from usuario where usu_vcCorreo = '$correo' and usu_iEstado = 1 ";
            $numData = $this->con->obtener_numData($consulta);
            return $numData;
		}
    }
?>