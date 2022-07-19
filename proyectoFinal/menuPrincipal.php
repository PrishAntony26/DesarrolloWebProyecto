<?php
	session_start();	
    $modo = $_SESSION['modo'];
    $nombre = $_SESSION['nombre'];
    if(!isset($modo)){
        $modo=-1;
    }
    $menu = new menuPrincipalForm();
    $menu->menuPrincipalFormShow($modo);
?>


<?php
    class menuPrincipalForm{
        public function menuPrincipalFormShow($modo){
            include_once('formShared/headSingleton.php');
            headSingleton::getHead($modo);

            //Mostrar lista de eventos
            include_once('Model/evento.php');
            $evento = new evento();
            $listaeventos = $evento->listarEventos();
            print_r($listaeventos);
            foreach($listaeventos as $evento){
                foreach($listaeventos as $campo){
                    echo "<p>".$campo."</p>";
                }
            }
        }
    }
?>