<html>
<head><title>Site</title>
</head>
<body>
<?php
//require('topo.php'); // Aqui � inclu�da a imagem do topo
require('template2.html'); // Aqui � inclu�do o menu

$go = @$_GET['go']; // Recebe o valor da GET "go", se houver

switch($go) // Faz um switch testando a vari�vel $go
{
    case 'inicio': // se $go for 'downloads'...
        require('form_administrativo.html'); // Inclui downloads.php
    break;
    case 'material': // se $go for 'artigos'...
       // require('artigos.php'); // Inclui artigos.php
    break;
    case 'equip': // se $go for 'tutos'...
       // require('tutoriais.php'); // Inclui tutoriais.php
    break;
    default: // Se n�o for igual a nada disso...
       // require('downloads.php'); // Inclui downloads.php
    break;
}

//require('rodape.php'); // Aqui � inclu�da a imagem do rodap�
?>
</body>
</html>