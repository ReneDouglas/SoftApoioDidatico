<?php
include_once "equipamento.php";

class factoryDAO{
	
	var $conexao;
		function Conectar(){
			
			$this->conexao = mysql_connect("localhost", "root", "");
			if ($this->conexao)
			{
				if (!mysql_select_db("bdapoiodidatico",$this->conexao))
					$this->Desconectar();
			}
		}
		
		function conexaoPDO(){
			
			$dsn = 'mysql:host=localhost;dbname=bdapoiodidatico';
			
			try {
				
				$this->conexao = new PDO($dsn, 'root', '');
				$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			} catch (PDOException $e) {
				echo $e->getMessage();
			}		
			
		}
		
		function Desconectar(){
			
			mysql_close($this->conexao);
			$this->conexao=0;
		}
		
		function getSalasDisponiveis(){
			
			$sqltxt="SELECT * FROM sala WHERE status='Disponivel' order by bloco,numero asc";
			$this->Conectar();
			$res=mysql_query($sqltxt,$this->conexao);
			if ($res && mysql_num_rows($res)>0)
			{
				$linhasini=1;
				$linhas=mysql_num_rows($res);
				$Campos=mysql_fetch_array($res) ;
				while ($linhasini <= $linhas)
				{
					$objSala= new Sala();
					$objSala->id=$Campos['id'];
					$objSala->num=$Campos['numero'];
					$objSala->bloco=$Campos['bloco'];
					$objSala->status=$Campos['status'];
		
					
					$ListSalas[$linhasini-1] = $objSala;
					$linhasini ++ ;
					$Campos=mysql_fetch_array($res) ;
				}
				return $ListSalas;
			}
			else
			{
				$this->Desconectar();
				return NULL;
			}
			
		}
		
		function getSalasOcupadas(){
			
			$sqltxt="SELECT * FROM sala WHERE status='Ocupada' order by bloco, numero asc";
			$this->Conectar();
			$res=mysql_query($sqltxt,$this->conexao);
			if ($res && mysql_num_rows($res)>0)
			{
				$linhasini=1;
				$linhas=mysql_num_rows($res);
				$Campos=mysql_fetch_array($res) ;
				while ($linhasini <= $linhas)
				{
					$objSala= new Sala();
					$objSala->id=$Campos['id'];
					$objSala->num=$Campos['numero'];
					$objSala->bloco=$Campos['bloco'];
					$objSala->status=$Campos['status'];
		
					
					$ListSalas[$linhasini-1] = $objSala;
					$linhasini ++ ;
					$Campos=mysql_fetch_array($res) ;
				}
				return $ListSalas;
			}
			else
			{
				$this->Desconectar();
				return NULL;
			}
			
		}
		
		function cadastrarEquipamento($codigo, $tipo, $estado, $observacao){
				
			$this->conexaoPDO();
			$this->conexao->beginTransaction();
	
			$sql = 'INSERT INTO equipamento (codigo, tipo, estado, observacao) VALUES (?,?,?,?)';
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(1,$codigo,PDO::PARAM_STR);
			$stmt->bindValue(2,$tipo,PDO::PARAM_STR);
			$stmt->bindValue(3,$estado,PDO::PARAM_STR);
			$stmt->bindValue(4,$observacao,PDO::PARAM_STR);
			
			try {
					$stmt->execute();
					$this->conexao->commit();
					
			} catch (PDOException $e) {
				return $resposta = "Error: ".$e->getMessage();
			}
					
			
		}
		
		function getEquipamentos(){
			
			$sql = "SELECT id, tipo, codigo, estado, observacao FROM equipamento";
			$this->Conectar();
			$res=mysql_query($sql,$this->conexao);
			
		if ($res && mysql_num_rows($res)>0)
			{
				$linhasini=1;
				$linhas=mysql_num_rows($res);
				$campos=mysql_fetch_array($res) ;
				while ($linhasini <= $linhas)
				{
					$objEquip = new Equipamento();
					$objEquip->id=$campos['id'];
					$objEquip->tipo=$campos['tipo'];
					$objEquip->codigo=$campos['codigo'];
					$objEquip->estado=$campos['estado'];
					$objEquip->observacao=$campos['observacao'];
					
					$listEquipamentos[$linhasini-1] = $objEquip;
					$linhasini++ ;
					$Campos=mysql_fetch_array($res) ;
				}
				
				return $listEquipamentos;
			}
			else
			{
				$this->Desconectar();
				return NULL;
			}
			
		}
		
		function emprestar_Equipamento($professor, $equipamento, $horaReserva, $horaDevolucao, $dataEmprestimo){
			
			$idUsuario = 2;
			
			$this->conexaoPDO();
			$this->conexao->beginTransaction();
			
			$retornarProf = 'SELECT id FROM professor WHERE nome=?';
			$consulta = $this->conexao->prepare($retornarProf);
			$consulta->bindParam(1, $professor, PDO::PARAM_STR);
			$consulta->execute();
			$prof_exists = $consulta->fetch(PDO::FETCH_COLUMN);
			
			$consulta = null;
			
			$retornarEquip = 'SELECT id FROM equipamento WHERE codigo=?';
			$consulta = $this->conexao->prepare($retornarEquip);
			$consulta->bindParam(1, $equipamento, PDO::PARAM_STR);
			$consulta->execute();
			$equip_exists = $consulta->fetch(PDO::FETCH_COLUMN);
			
			$dataSave = 'INSERT INTO retiraequipamento (idUsuario, idProfessor, idEquipamento, horaReservado, horaDevolucao, dia) VALUES (?,?,?,?,?,?)';
			$persist = $this->conexao->prepare($dataSave);
			$persist->bindValue(1,$idUsuario,PDO::PARAM_INT);
			$persist->bindValue(2,$prof_exists,PDO::PARAM_INT);
			$persist->bindValue(3,$equip_exists,PDO::PARAM_INT);
			$persist->bindValue(4,$horaReserva,PDO::PARAM_STR);
			$persist->bindValue(5,$horaDevolucao,PDO::PARAM_STR);
			$persist->bindValue(6,$dataEmprestimo,PDO::PARAM_STR);
			
			try {
					$persist->execute();
					$this->conexao->commit();
					
			} catch (PDOException $e) {
				return $resposta = "Error: ".$e->getMessage();
			}			
	
			
		}
	}
?>