<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Cadastro Equipamento</title>
	</head>
<body>

<?php

	$codigo = $_POST['cod_equip'];
	$tipo = $_POST['tipo_equip'];
	$estado = $_POST['estado_equip'];
	
	$dsn = 'mysql:host=localhost;dbname=bdapoiodidatico';
	try {
		$pdo = new PDO($dsn, 'root', '');
	} catch (PDOException $e) {
		echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
		die;
	}	
	$pdo->beginTransaction();
			//UPDATE equipamento SET tipo =  'DataShow',estado =  'Quebrado' WHERE codigo =  '123c'
	$sql = 'UPDATE equipamento SET tipo=?, estado=? WHERE codigo=?';
	$stmt = $pdo->prepare($sql);	
	$stmt->bindValue(1,$tipo,PDO::PARAM_STR);
	$stmt->bindValue(2,$estado,PDO::PARAM_STR);
	$stmt->bindValue(3,$codigo,PDO::PARAM_STR);
	
	try {
			$stmt->execute();
			$pdo->commit();
			
	} catch (PDOException $e) {
		$erro = "yes";
		echo "Error: ".$e->getMessage();
	}

?>

<input type="button" value="Voltar" onClick="history.go(-1)">

</body>
</html>