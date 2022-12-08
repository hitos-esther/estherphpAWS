<?php

	// recuperamos los datos de sesión
	session_start() ;

	// eliminamos los datos de sesión
	$_SESSION = [] ; 

	// destruimos la sesión del servidor
	session_destroy() ;

	// redirigimos al login
	header("location: index.php") ;