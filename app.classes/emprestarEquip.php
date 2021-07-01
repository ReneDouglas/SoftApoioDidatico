<?php

	$professor = $_POST['nomeProfessor'];
	$equipamento = $_POST['codigoEquipamento'];
	$horaReserva = $_POST['horaReserva'];
	$horaDevolucao = $_POST['horaDevolucao'];
	$dataEmprestimo = $_POST['dataEmprestimo'];
	
	include_once 'factoryDAO.php';
	
	$persist = new factoryDAO();
	
	$persist->emprestar_Equipamento($professor, $equipamento, $horaReserva, $horaDevolucao, $dataEmprestimo);


?>