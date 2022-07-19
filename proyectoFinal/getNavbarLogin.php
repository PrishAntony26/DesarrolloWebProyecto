<?php
//index
	include_once('securityModule/formLogin.php');
	$objFormAutenticarUsuario = new formLogin;
	$objFormAutenticarUsuario -> formLoginShow();
?>