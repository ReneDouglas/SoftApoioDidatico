<?php
	class TErro extends TELement {
		function __construct(){
			parent::__construct('div');
			
			$obj = new TElement('h1');
			$obj->add('Página solicitada não encontrada.');
			parent::add($obj);
			
			$obj = new TElement('p');
			$obj->add('Você pode ter clicado em um link expirado ou digitado o 
					endereço errado. Alguns endereços da web diferenciam 
					letras maiúsculas de minúsculas.');
			parent::add($obj);
			
			$obj = new TElement('a');
			$obj->add("Retornar à página inicial");
			$obj->href = 'index.php';
			parent::add($obj);
		}
	}
?>