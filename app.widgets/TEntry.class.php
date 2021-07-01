<?php
/**
 * classe TEntry
 * classe para constru��o de caixas de texto
 */
class TEntry extends TField
{
    private $mask;
	
	function setMask($mask){
		$this->mask = $mask;
	}
	/**
     * m�todo show()
     * exibe o widget na tela
     */
    public function show()
    {
        // atribui as propriedades da TAG
        $this->tag->name = $this->name;     // nome da TAG
        $this->tag->value = $this->value;   // valor da TAG
        $this->tag->type = 'text';          // tipo de input
        $this->tag->autocomplete = 'off';
		$this->tag->alt = $this->mask;
		//$this->tag->style = "width:{$this->size}"; // tamanho em pixels
        
        // se o campo n�o � edit�vel
        if (!parent::getEditable())
        {
            $this->tag->readonly = "1";
            $this->tag->class = 'tfield_disabled'; // classe CSS
        }
        // exibe a tag
        $this->tag->show();
    }
}
?>