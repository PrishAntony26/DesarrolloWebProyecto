<?php
    
    $listaPrivilegios = $_SESSION['privilegio'];
    include_once('../securityModule/formMenuPrincipal.php');
	$objFormPrincipal = new formMenuPrincipal;
	$objFormPrincipal -> formMenuPrincipalShow($listaPrivilegios,2);	
?>