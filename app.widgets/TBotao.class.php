<?php
	class TBotao extends TElement {
		/*
		 * Método construtor de TButao
		 * cria um elemento <a>
		 * $nome = Texto add no elemento <a>
		 * $url = url passada para href de <a>
		 * $classe em que o conteudo de <a> pertence
		 */
		function __construct($nome, $url, $classe = 'textButton'){
			parent::__construct('a');
			
			$span = new TElement ('span');
			$span->class = $classe;
			$span->add($nome);
			
			$this->class = 'button';
			$this->href = $url;
			parent::add($span);
		}
		function setTitulo($title){
			$this->title = $title;
		}
	}
?>