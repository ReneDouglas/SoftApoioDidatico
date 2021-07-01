<?php

header("Content-Type: text/xml");
	
	include_once($_SERVER['DOCUMENT_ROOT']."factoryDAO.php");
	$pesquisa = new factoryDAO();
	$listEquips = $pesquisa->getEquipamentos();
	echo "<equipamentos>\n";
		for ( $i = 0; $i < count( $listEquips ); $i++ ) 
		{
			echo "	<equipamento tipo = '".$listEquips[$i]->tipo."' codigo = '".$listSalas[$i]->codigo."' estado = '".$listEquips[$i]->estado."' observacao = '".$listEquips[$i]->observacao."' idEquip = '".$listEquips[$i]->id."' />\n";
		}
	echo "</equipamentos>";

?>