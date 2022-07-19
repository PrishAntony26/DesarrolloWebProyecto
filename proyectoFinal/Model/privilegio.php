<?php
    include_once('conexionSingleton.php');
    class privilegio
    {
        private $con=null;
    
        public function __construct(){
            $this->con = conexionSingleton::obtenerInstancia();
        }
        public function listarPrivilegio()
        {
            $consulta = "SELECT * FROM privilegio";
            $resultado = $this->con->obtener_data($consulta);
            return $resultado;
        }
    }
?>