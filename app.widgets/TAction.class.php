<?php
/**
 * classe TAction
 * encapsula uma aчуo
 */
class TAction
{
    private $action;
    private $param;
    
    /**
     * mщtodo __construct()
     * instancia uma nova aчуo
     * @param $action = mщtodo a ser executado
     */
    public function __construct($action)
    {
        $this->action = $action;
    }
    
    /**
     * mщtodo setParameter()
     * acrescenta um parтmetro ao mщtodo a ser executdao
     * @param $param = nome do parтmetro
     * @param $value = valor do parтmetro
     */
    public function setParameter($param, $value)
    {
        $this->param[$param] = $value;
		//$this->param[$param] = base64_encode($value);
    }
    
    /**
     * mщtodo serialize()
     * transforma a aчуo em uma string do tipo URL
     */
    public function serialize()
    {
		$url = Array();
        // verifica se a aчуo щ um mщtodo
        if (is_array($this->action))
        {
            $url['class'] = $this->action[0];
			// obtщm o nome da classe
            //$url['class'] = get_class($this->action[0]);
			//$str			= get_class($this->action[0]);
            //$url['class']	= base64_encode($str);
			// obtщm o nome do mщtodo
            $url['method'] = $this->action[1];
			//$str			= $this->action[1];
			//$url['method']	= base64_encode($str);
        }
        else if (is_string($this->action)) // щ uma string
        {
            // obtщm o nome da funчуo
            $url['method'] = $this->action;
			//$str			= $this->action;
			//$url['method']	= base64_encode($str);
        }
        // verifica se hс parтmetros
        if ($this->param)
        {
            $url = array_merge($url, $this->param);
        }
        // monta a URL
        
		return '?' . http_build_query($url);
    }
}
?>