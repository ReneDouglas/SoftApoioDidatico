<?php

	$codigo = $_POST['codigoEquipamento'];
	$tipo = $_POST['tipoEquipamento'];
	$estado = $_POST['estadoEquipamento'];
	$obs = $_POST['observ'];
	
	include_once 'factoryDAO.php';
	
	$persist = new factoryDAO();
	
	$retorno = $persist->cadastrarEquipamento($codigo, $tipo, $estado, $obs);


?>
