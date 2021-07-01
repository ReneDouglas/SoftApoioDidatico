<?php
/**
 * classe TSession
 * gerencia uma seção com o usuário
 */
class TSession
{
    /**
     * método construtor
     * inicializa uma seção
     */
    function __construct()
    {
        session_start();
    }

    /**
     * método setValue()
     * armazena uma variável na seção
     * @param $var     = Nome da variável
     * @param $value = Valor
     */
    static public function setValue($var, $value)
    {
        $_SESSION[$var] = $value;
    }

    /**
     * método getValue()
     * retorna uma variável da seção
     * @param $var = Nome da variável
     */
    static public function getValue($var)
    {
        if (isset($_SESSION[$var]))
        {
            return $_SESSION[$var];
        }
		else
		{
			return false;
		}
    }

    /**
     * método freeSession()
     * destrói os dados de uma seção
     */
    static public function freeSession()
    {
        $_SESSION = array();
        session_destroy();
    }
}
?>
