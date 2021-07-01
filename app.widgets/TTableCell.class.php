<?php
/**
 * classe TTableCell
 * repons�vel pela exibi��o de uma c�lula de uma tabela
 */
class TTableCell extends TElement
{
    /**
     * m�todo construtor
     * instancia uma nova c�lula
     * @param $value = conte�do da c�lula
     */
    public function __construct($value, $header=false)
    {
        $str = $header? 'th' : 'td';
		parent::__construct($str);
        parent::add($value);
    }
}
?>