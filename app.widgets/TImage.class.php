<?php
/**
 * classe TImage
 * classe para exibi��o de imagens
 */
class TImage extends TElement
{
    private $source; // localiza��o da imagem
    /**
     * m�todo construtor
     * instancia objeto TImage
     * @param $source = localiza��o da imagem
     */
    public function __construct($source,$alt="")
    {
        parent::__construct('img');
        
        // atribui a localiza��o da imagem
        $this->source = $source;
		$this->src = $source;
		$this->alt = $alt;
    }
}
?>