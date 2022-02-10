<?php 
	function conectarse() 
	{	
		$ser="localhost:3306"; 		$user="forge";		$pass="ipJlBz5ays4ho80oULXY";		$db="calculadora_sears";
				
		$conexion = mysqli_connect($ser ,$user ,$pass) or die("Error de Conexión. Intente más tarde.");
		$db = mysqli_select_db( $conexion, $db ) or die ( "Error. No hay conexión con la Base de Datos" );
		
		@mysqli_query($conexion,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

		return $conexion; 
		
	}
?>