<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "localhost";    // sera el valor de nuestra BD 
	$basededatos = "buscararchivo";    // sera el valor de nuestra BD 
	$usuariodb = "Felipe";    // sera el valor de nuestra BD 
	$clavedb = "12345";    // sera el valor de nuestra BD 

	//Lista de Tablas
	$tabla_db1 = "info"; 	   // tabla de informacion de los archivos
	$tabla_db2 = "tipo"; 	   // tabla de informacion de los archivos
	

	//error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>
