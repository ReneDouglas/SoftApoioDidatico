<?php
/**
 * classe TDataGrid
 * classe para constru��o de Listagens
 */
class TDataGrid extends TTable
{
    private $columns;
    private $actions;
    private $rowcount;
    
    /**
     * m�todo __construct()
     * instancia uma nova DataGrid
     */
    public function __construct()
    {
        parent::__construct();
        $this->class = 'datagrid_table';
	}
    
    /**
     * m�todo addColumn()
     * adiciona uma coluna � listagem
     * @param $object = objeto do tipo TDataGridColumn
     */
    public function addColumn(TDataGridColumn $object)
    {
        $this->columns[] = $object;
    }
    
    /**
     * m�todo addAction()
     * adiciona uma a��o � listagem
     * @param $object = objeto do tipo TDataGridAction
     */
    public function addAction(TDataGridAction $object)
    {
        $this->actions[] = $object;
    }
    
    /**
     * m�todo clear()
     * elimina todas linhas de dados da DataGrid
     */
    function clear()
    {
        // faz uma c�pia do cabe�alho
        $copy = $this->children[0];
        
        // inicializa o vetor de linhas
        $this->children = array();
        
        // acrescenta novamente o cabe�alho
        $this->children[] = $copy;
        
        // zera a contagem de linhas
        $this->rowcount = 0;
    }
    
    /**
     * m�todo createModel()
     * cria a estrutura da Grid, com seu cabe�alho
     */
    public function createModel()
    {
        // adiciona uma linha � tabela
        $row = parent::addRow();
        
        // adiciona c�lulas para as a��es
        if ($this->actions)
        {
            foreach ($this->actions as $action)
            {
                $celula = $row->addCell('', true);
                $celula->class = 'datagrid_col';
            }
        }
        
        // adiciona as c�lulas para os dados
        if ($this->columns)
        {
            // percorre as colunas da listagem
            foreach ($this->columns as $column)
            {
                // obt�m as propriedades da coluna
                $name = $column->getName();
                $label = $column->getLabel();
                $align = $column->getAlign();
                $width = $column->getWidth();
                
                // adiciona a c�lula com a coluna
                $celula = $row->addCell($label, true);
                $celula->class = 'datagrid_col';
                $celula->align = $align;
                $celula->width = $width;
                
                // verifica se a coluna tem uma a��o
                if ($column->getAction())
                {
                    $url = $column->getAction();
                    $celula->onmouseover = "this.className='tdatagrid_col_over';";
                    $celula->onmouseout  = "this.className='tdatagrid_col'";
                    $celula->onclick     = "document.location='$url'";
                }
            }
        }
    }
    
    /**
     * m�todo addItem()
     * adiciona um objeto na grid
     * @param $object = Objeto que cont�m os dados
     */
    public function addItem($object)
    {
        // cria um estilo com cor vari�vel
        //$bgcolor = ($this->rowcount % 2) == 0 ? '#ffffff' : '#e0e0e0';
        
        // adiciona uma linha na DataGrid
        $row = parent::addRow();
        //$row->bgcolor = $bgcolor;
        $cell = new TElement('td');
        // verifica se a listagem possui a��es
        if ($this->actions)
        {
            // percorre as a��es
            foreach ($this->actions as $action)
            {
                // obt�m as propriedades da a��o
                $url    = $action->serialize();
                $label = $action->getLabel();
                $image = $action->getImage();
                $field = $action->getField();
                
                // obt�m o campo do objeto que ser� passado adiante
                $key    = $object->$field;
                /*
                // cria um link
				$link = new TElement('a');
                $link->href="{$url}&key={$key}";
                
                // verifica se o link ser� com imagem ou com texto
                if ($image)
                {
                    // adiciona a imagem ao link
                    $image=new TImage("app.images/$image");
                    $link->add($image);
                }
                else
                {
                    // adiciona o r�tulo de texto ao link
                    $link->add($label);
                }
				*/
                // adiciona a c�lula � linha
                $classe = $action->getClasse();
                $titulo = $action->getTitulo();
				
				$botao = new TBotao($label,"{$url}&key={$key}",$classe);
				$botao->setTitulo($titulo);
				
				$cell->add($botao);
            }
			
			$row->addCell($cell);
        }
        
        if ($this->columns)
        {
            // percorre as colunas da DataGrid
            foreach ($this->columns as $column)
            {
                // obt�m as propriedades da coluna
                $name     = $column->getName();
                $align    = $column->getAlign();
                $width    = $column->getWidth();
                $function = $column->getTransformer();
                $data     = $object->$name;
                
				if($action = $column->getDataAcrion()){
					// obt�m as propriedades da a��o
					$url	= $action->serialize();
					$field	= $action->getField();
					// obt�m o campo do objeto que ser� passado adiante
					$key    = $object->$field;
					
					// cria um link
					$a = new TElement('a');
					$a->href = "{$url}&key={$key}";
					$a->add($data);
					
					$data = $a;
				}
				
                // verifica se h� fun��o para transformar os dados
                if ($function)
                {
                    // aplica a fun��o sobre os dados
                    $data = call_user_func($function, $data);
                }
                
                // adiciona a c�lula na linha
                $celula = $row->addCell($data);
                $celula->align = $align;
                $celula->width = $width;
            }
        }
        // incrementa o contador de linhas
        $this->rowcount ++;
    }
}
?>