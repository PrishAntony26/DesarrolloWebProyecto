<?php
    class conexionSingleton
    {
        private static  $instancia = null;
        private $con = null;
        private function __construct()
        {
            $this->con = mysqli_connect('localhost','root','','cinesistema');
        }

        public static function obtenerInstancia(){
            if(self::$instancia==null)
                self::$instancia = new self();
            return(self::$instancia);
            
        }
        
        public function getConnection()
        {
            return $this->con;
        }
        
        public function obtener_data($consulta){
            $mysqli = $this->getConnection();
            $resultado = $mysqli->prepare($consulta);
			$resultado->execute();
			$resultadoC = $resultado->get_result();
			$cantidadRegistros = $resultadoC->num_rows;						
			for($i = 0; $i < $cantidadRegistros; $i++)
			{
				$listaPrivilegios[$i] = $resultadoC->fetch_assoc();	
			}
			return($listaPrivilegios);	
        }

        public function ejecutarConsulta($consulta){
            $mysqli = $this->getConnection();
            return $mysqli->query($consulta);
        }

        public function obtener_registro($consulta){
            $mysqli = $this->getConnection();
            return $mysqli->query($consulta);
        }

        public function obtener_numData($consulta){
            $mysqli = $this->getConnection();
            $resultado = $mysqli->prepare($consulta);
			$resultado->execute();
			$resultadoC = $resultado->get_result();
			$cantidadRegistros = $resultadoC->num_rows;		
            return $cantidadRegistros;
        }
    }

?>