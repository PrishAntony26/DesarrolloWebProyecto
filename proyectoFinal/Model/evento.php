<?php
    include_once('conexionSingleton.php');
    class evento
    {
        private $con=null;
    
        public function __construct(){
            $this->con = conexionSingleton::obtenerInstancia();
        }
        public function listarEventos()
        {
            $consulta = "SELECT * FROM evento";
            $resultado = $this->con->obtener_data($consulta);
            return $resultado;
        }


    }

?>