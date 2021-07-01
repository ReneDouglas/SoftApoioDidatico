<?php
/**
 * classe TTableRow
 * repons�vel pela exibi��o de uma linha de uma tabela
 */
class TTableRow extends TElement
{
    /**
     * m�todo construtor
     * instancia uma nova linha
     */
    public function __construct()
    {
        parent::__construct('tr');
    }
    
    /**
     * m�todo addCell
     * agrega um novo objeto c�lula (TTableCell) � linha
     * @param $value = conte�do da c�lula
     */
    public function addCell($value, $header=false)
    {
        // instancia objeto c�lula
        $cell = new TTableCell($value,$header);
        parent::add($cell);
        
        // retorna o objeto instanciado
        return $cell;
    }
}
?>