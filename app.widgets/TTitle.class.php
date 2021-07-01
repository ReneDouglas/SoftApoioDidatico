<?php
	class TTitle extends TElement {
		private $nome;
		private $links;
		function __construct($nome) {
			parent::__construct('p');
			$this->class = 'title';
			$this->nome = $nome;
		}
		function addLink($nome,$url){
			$this->links[$nome] = $url;
		}
		function show() {
			if($this->links){
				foreach($this->links as $nome=>$url){
					$a = new TElement('a');
					$a->href = $url;
					$a->add($nome);
					parent::add($a);
					
					$span = new TElement('span');
					$span->add('&gt;&gt;');
					parent::add($span);
				}
			}
			parent::add($this->nome);
			parent::show();
		}
	}
?>