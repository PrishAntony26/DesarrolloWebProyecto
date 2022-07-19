<?php
    class formMenuPrincipal
    {
        public function formMenuPrincipalShow($listaPrivilegios,$modo)
		{
            include_once('../formShared/headSingleton.php');
            headSingleton::getHead();
			?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Principal</title>
            </head>
            
            <body>
            <?php
                echo "<div class='container mt-5'>";
                echo "<div class='card-deck'>";
                foreach($listaPrivilegios as $privilegio){
                        echo "
                            <div class='card' style='width: 18rem;'>
                                <img class='card-img-top' src='...' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$privilegio['pri_vcNombre']."</h5>
                                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div class='text-center'>
                                    <a href='".$privilegio['pri_vcPathPrivilegio']."' class='btn btn-primary'>Go somewhere</a>
                                    </div>
                                </div>
                            </div>"	;
                }
                echo "</div>";
                echo "</div>";
                if($modo==1)
                    echo "<a href='getSalirSesion.php'> Salir de la sesion </a>";
                else
                    echo "<a href='../securityModule/getSalirSesion.php'> Salir de la sesion </a>";
			?>
            
            </body>
            </html>
            
            <?php	
		}	

    }


?>