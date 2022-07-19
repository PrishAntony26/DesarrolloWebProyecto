<?php
    include_once('conexionSingleton.php');
    class detalleprivilegio
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
    
        public function asignarPrivilegio($idUsuario)
        {
            $consulta = "INSERT INTO `detalleprivilegio`(`usuario_usu_iCodigo`, `privilegio_pri_iCodigo`) 
            VALUES ('$idUsuario',1)";//Registrado como cliente
            return $this->con->ejecutarConsulta($consulta);
        }

        public function obtenerPrivilegios($correo)
        {
            $consulta = "SELECT * FROM privilegio WHERE pri_iCodigo IN (SELECT dp.privilegio_pri_iCodigo 
            FROM usuario u JOIN detalleprivilegio dp ON (u.usu_iCodigo = dp.usuario_usu_iCodigo)
            WHERE (u.usu_vcCorreo = '$correo'))";
            return $this->con->obtener_data($consulta);
        }

    }
?>