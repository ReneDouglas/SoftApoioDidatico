<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Cadastro Administrativo</title>
	</head>
<body>


<?php

	$nome		= $_POST['nome'];
	$matricula	= $_POST['matricula'];
	
	$dsn = 'mysql:host=localhost;dbname=bdapoiodidatico';
	$pdo = new PDO($dsn, 'root', '');
	$pdo->beginTransaction();

	$sql = 'INSERT INTO professor (nome,matricula) VALUES (?,?)';
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(1,$nome,PDO::PARAM_STR);
	$stmt->bindValue(2,$matricula,PDO::PARAM_STR);

	$erro = "no";
	
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