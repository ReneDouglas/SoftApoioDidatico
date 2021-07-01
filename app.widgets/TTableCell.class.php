<?php
/**
 * classe TTableCell
 * reponsсvel pela exibiчуo de uma cщlula de uma tabela
 */
class TTableCell extends TElement
{
    /**
     * mщtodo construtor
     * instancia uma nova cщlula
     * @param $value = conteњdo da cщlula
     */
    public function __construct($value, $header=false)
    {
        $str = $header? 'th' : 'td';
		parent::__construct($str);
        parent::add($value);
    }
}
?>