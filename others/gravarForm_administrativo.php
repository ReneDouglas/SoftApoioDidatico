<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Cadastro Administrativo</title>
	</head>
<body>

<?php

	$nome		= $_POST['nome'];
	$email		= $_POST['email'];
	$matricula	= $_POST['matricula'];
	$login		= $_POST['login'];
	$senha		= $_POST['senha'];
	$conf_senha = $_POST['conf_senha'];
	
	$dsn = 'mysql:host=localhost;dbname=bdapoiodidatico';
	$pdo = new PDO($dsn, 'root', '');
	$pdo->beginTransaction();

	$sql = 'INSERT INTO administrativo (nome,email,matricula,login,senha) VALUES (?,?,?,?,?)';
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(1,$nome,PDO::PARAM_STR);
	$stmt->bindValue(2,$email,PDO::PARAM_STR);
	$stmt->bindValue(3,$matricula,PDO::PARAM_STR);
	$stmt->bindValue(4,$login,PDO::PARAM_STR);
	$stmt->bindValue(5,$senha,PDO::PARAM_STR);


	$erro = "no";
	
	try {
		if($senha == $conf_senha){
			$stmt->execute();
			$pdo->commit();
		}
		else{
			echo "<b><font face='Arial'>As senhas são diferentes!</font></b>";
		}
			
	} catch (PDOException $e) {
		$erro = "yes";
		echo "Error: ".$e->getMessage();
	}
	
	//if($erro == "no"){
	//	echo "Dados gravados com sucesso!";
	//}
	
	
/*<input type="button" value="Voltar" onClick="history.go(-1)"> 
<input type="button" value="Avançar" onCLick="history.forward()"> 
<input type="button" value="Atualizar" onClick="history.go(0)"> */

?>

<input type="button" value="Voltar" onClick="history.go(-1)">

</body>
</html>
