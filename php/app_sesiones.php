<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
	function crea_sesion($name, $valor)
	{
		$_SESSION[$name]=$valor;
		return $_SESSION[$name];
	}

	if (@$_POST['iniciar']==1)
	{
		session_destroy();
		session_start();
	}


	

	crea_sesion($_POST['name'],$_POST['valor']);
	
	foreach ($_SESSION as $key=>$val)
		echo $key." ".$val."\n";
?>