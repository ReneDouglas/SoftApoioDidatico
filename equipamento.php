<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>

	<style type="text/css">
		#topo{
			width: 80%;
			height: 70px;
			margin-left:auto;
			margin-right:auto;
			background-color:#999;
			clear:both;
			}
		#topo ul{
			float:left;
			margin-top:20px;
			}	
		#topo ul li{
			display:inline;
			float:left;
			margin-left:30px;
			margin-right:50px;
			}
		#logout{
			float:right;
			margin-right:50px;
			margin-top:20px;
			}	
		#site{
			width:80%;
			margin-left:auto;
			margin-right:auto;
			}
		#site #menu{
			width:20%;
			float:left;
			}	
		#site #sala{
			width:80%;
			float:left;
			}	
		#menu ul li{
			margin-top: 5%;
			margin-bottom: 21.4%;
			display:block;
			}
		#menu fieldset{
			height: 350px;
			}	
		#sala fieldset{
			height: 350px;
			}
		#selec{
			width:40%;
			float:left;
			text-align:center;
			}
		#selec1{
			width:60%;
			height:100%;
			float:left;
			}
		#selec1 *{
			margin-bottom:10%;
			margin-right:10%;
			}	
		#sala fieldset form{
			width:100%;
			height:100%;
			text-align:justify;
			}
		#scroll {
			width: 500px;
			height: 180px;
			overflow: auto;
			}
	</style>
		
		<script type="text/javascript">
			
		
		function cadastrar(){
			
			var equip = document.getElementById("equip");
			var text = "<legend><h1>Cadastrar Equipamento</h1></legend>";
			text	+="		<div id='selec1'>";
			text	+="			<form name='form_cadastro' method='post' action='app.control/gravarForm_equip.php'>";
			text	+="					<table width='50%' border='0'>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Código:</font></td>";
			text	+="							<td><input type='text' value='' name='codigoEquipamento' size='10'></td>";		
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Tipo:</font></td>";
			text	+=" 						<td>";
			text	+="								<select name='tipoEquipamento'>";
			text	+="									<option>DataShow</option>";
			text	+="									<option>Filtro de Finha</option>";
			text	+="									<option>Retroprojetor</option>";
			text	+="									<option>Gabinete</option>";
			text	+="									<option>Estabilizador</option>";
			text	+="								</select>";			
			text	+="							</td>";
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Estado:</font></td>";
			text	+="							<td>";
			text	+="								<select name='estadoEquipamento'>";
			text	+="								<option>Bom</option>";
			text	+="								<option>Quebrado</option>";
			text	+="								</select>";
			text	+="							</td>";
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Obs.:</font></td>";
			text	+="							<td>";
			text	+="								<textarea name=observ cols=25 rows=3></textarea>";
			text	+="							</td>";	
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td colspan=3 align=center>";
			text	+="								<input type='submit' value='Salvar'>";
			text	+="							</td>";	
			text	+="						</tr>";
			text	+="					</table>";
			text	+="				</form>";
			text	+="			</div>";
			equip.innerHTML=text;
			
			
		}
		
		
		function emprestar(){
			
			var equip = document.getElementById("equip");
			var text = "<legend><h1>Emprestar Equipamento</h1></legend>";
			text	+="		<div id='selec1'";
			text	+="			<form name='form_emprestar' method='post'>";
			text	+="				<table width='50%' border='0'>";
			text	+="					<tr>";
			text	+="						<td valign=top><font face='Arial'> Professor:</font></td>";
			text	+="						<td><input type='text' value='' name='nomeProfessor' size='20'></td>";
			text	+="					</tr>";
			text	+="					<tr>";
			text	+="						<td valign=top><font face='Arial'> Equipamento:</font></td>";
			text	+="						<td>";
			text	+="							<select name='nomeEquipamento'>";
			text	+="                       			<option>DataShow</option>";
			text	+="                        		<option>Filtro de Finha</option>";
			text	+="                        		<option>Retroprojetor</option>";
			text	+="								<option>Gabinete</option>";
			text	+="								<option>Estabilizador</option>";
			text	+="							</select>";
			text	+="						</td>";
			text	+="					</tr>";
			text	+="					<tr>";
			text	+="						<td valign=top><font face='Arial'> Sala:</font></td>";
			text	+="						<td>";
			text	+="							<select name='salaBlocoEquipamento'>";
			text	+="								 <option>Sala 1</option>";
			text	+="                        		 <option>Sala 2</option>";
			text	+="                        		 <option>Sala 3</option>";
			text	+="                        		 <option>Sala 4</option>";
			text	+="                        		 <option>Sala 5</option>";
			text	+="                        		 <option>Sala 6</option>";
			text	+="                        		 <option>Sala 7</option>";
			text	+="                        		 <option>Sala 8</option>";
			text	+="                        		 <option>Sala 9</option>";
			text	+="                         	 <option>Sala 10</option>";
            text	+="								 <option>Sala 11</option>";
            text	+="								 <option>Sala 12</option>";
            text	+="								 <option>Sala 13</option>";
            text	+="								 <option>Sala 14</option>";
            text	+="								 <option>Sala 15</option>";
            text	+="							</select>";
            text	+="						</td>";
            text	+="					</tr>";
            text	+="					<tr>";
            text	+="						<td valign=top><font face='Arial'> Bloco:</font></td>";
            text	+="						<td>";
            text	+="							<select name='salaBlocoEquipamento'>";
            text	+="								<option>Bloco 1</option>";
            text	+="                       		<option>Bloco 2</option>";
            text	+="                       			<option>Bloco 3</option>";
            text	+="							</select>";
            text	+="						</td>";
            text	+="					</tr>";
            text	+="					<tr>";
            text	+="						<td valign=top><font face='Arial'> Data:</font></td>";
            text	+="						<td><input type='text' value='' id='campoData' name='data_emprestimo' size='20'></td>";
            text	+="					</tr>";
            text	+="				</table>";
            text	+="				<input type='submit' value='Emprestar'>";
            text	+="			</form>";
            text	+="		</div>";
            
            equip.innerHTML=text;
		}
		
		function alterar(){
			
			var equip = document.getElementById("equip");
			var text = "<legend><h1>Alterar Equipamento</h1></legend>";			
			text	+="				<div id='selec1'>";
			text	+="					<form name='form_alterar' method='post' action='app.control/alterarForm_equip.php'>";
			text	+="					<table width='100%' border='0'>";
			text	+="								<tr>";
			text	+="									<td valign=top><font face='Arial'> Codigo:</font>";
			text	+="										<input type='text' value='' name='cod_equip' size='20'/></td>";
			text	+="									<td valign=top><font face='Arial'> Tipo:</font>";
			text	+="										<select name='tipo_equip'>";
			text	+="											<option>DataShow</option>";
			text	+="											<option>Filtro de Finha</option>";
			text	+="											<option>Retroprojetor</option>";
			text	+="											<option>Gabinete</option>";
			text	+="											<option>Estabilizador</option>";
			text	+="										</select>";									
			text	+="									</td>";
			text	+="									<td valign=top><font face='Arial'> Estado:</font>";
			text	+="										<select name='estado_equip'>";
			text	+="										<option>Bom</option>";
			text	+="										<option>Quebrado</option>";
			text	+="										</select>";
			text	+="									</td>";
			text	+="									<td valign=middle><input type='submit' value='Alterar'/></td>";
			text	+="								</tr>";	
			text	+="						</table>";
			text	+="						<?php $link = mysql_connect('localhost','root','');?>";
			text	+="						<?php $conexao = mysql_select_db('bdapoiodidatico',$link); if($conexao){ ?>";
			text	+="						<?php $sql = "SELECT id, codigo, tipo, estado, observacao FROM equipamento"; ?>";
			text	+="						<?php $consulta = mysql_query($sql); ?>";
			text	+="						<?php echo "<div id='scroll'>";	?>"; 
			text	+="						<?php echo "<table  width='100%'>"; ?>";
			text	+="						<?php echo "<tr  bgcolor='#999'  align='Center'>"; ?>";
			text	+="						<?php echo "<th>Equipamento</th>"; ?>";
			text	+="						<?php echo "<th>Código</th>"; ?>";
			text	+="						<?php echo "<th>Estado</th>"; ?>";
			text	+="						<?php echo "<th>Observações</th>"; ?>";
			text	+="						<?php echo "<th>Alterar</th>"; ?>";
			text	+="						<?php echo "</tr>"; ?>";
			text	+="						<?php while($registro = mysql_fetch_assoc($consulta)){ ?>";
			text	+=" 					<?php echo "<tr value=id>"; ?>";
			text	+=" 					<?php echo "<td>".$registro['tipo']."</td>"; ?>";
			text	+=" 					<?php echo "<td>".$registro['codigo']."</td>"; ?>";
			text	+=" 					<?php echo "<td>".$registro['estado']."</td>"; ?>";
			text	+=" 					<?php echo "<td>".$registro['observacao']."</td>"; ?>";
			text	+="                     <?php echo "<td><input type='button' onclick='buscar("."".$registro['id']."".","."'".$registro['tipo']."'".","."'".$registro['codigo']."'".","."'".$registro['estado']."'".","."'".$registro['observacao']."'".")'"." value='Alterar'></td>"; ?>";
			text	+=" 					<?php echo "</tr>";} ?>";
			text	+=" 					<?php echo "</table>";} ?>";
			text	+=" 					<?php echo "</div>" ?>";
			text	+="					</form>"
			text	+=" 		 	</div>";
			
			equip.innerHTML=text;
			
		}
		
		
		function devolucao(){
			
			var equip = document.getElementById("equip");
			var text = "<legend><h1>Pesquisar Equipamento</h1></legend>";
			text	+=" 			<div id='selec1'>";
			text	+=" 				<form>";
			text	+=" 					<table  width='100%'>";
			text	+=" 					<tr  bgcolor='#999'  align='Center' > ";
			text	+=" 						<th>Professor</th>";
			text	+=" 						<th>Equipamento</th>";
			text	+=" 						<th>Sala</th>";
			text	+=" 						<th>Bloco</th>";
			text	+=" 						<th>Entregar</th>";				
			text	+=" 					</tr>";	
			text	+=" 					<tr>";
			text	+=" 						<td>tal</td>";
			text	+=" 						<td>34</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td><input type='button' value='Entregar'/></td>";					
			text	+=" 					</tr>";
			text	+=" 						<tr bgcolor=''#CCCCCC '>";
			text	+=" 						<td>erre</td>";
			text	+=" 						<td>53</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td><input type='button' value='Entregar'/></td>";					
			text	+=" 					</tr>";
			text	+=" 					<tr>";
			text	+=" 						<td>erre</td>";
			text	+=" 						<td>53</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td>Bom</td>";
			text	+=" 						<td><input type='button' value='Entregar'/></td>";					
			text	+=" 					</tr>";
			text	+=" 					<tr bgcolor='#CCCCCC'>";
			text	+=" 						<td>Tal</td>";
			text	+=" 						<td>34534</td>";
			text	+=" 						<td>Quebrado</td>";
			text	+=" 						<td>Quebrado</td>";
			text	+=" 						<td><input type='button' value='Entregar'/></td>"; 					
			text	+=" 						</tr>";				
			text	+=" 				</table>";
			text	+=" 			</form>";
			text	+=" 		</div>";
			
			equip.innerHTML=text;

		}
		
		function buscar(id,tipo,codigo,estado,observacao){
			
			
			
			
			
			var equip = document.getElementById("equip");
			var text = "<legend><h1>Cadastrar Equipamento</h1></legend>";
			text	+="		<div id='selec1'>";
			text	+="			<form name='form_cadastro' method='post' action='app.control/gravarForm_equip.php'>";
			text	+="					<table width='50%' border='0'>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Código:</font></td>";
			text	+="							<td><input type='text' value='' name='codigoEquipamento' size='10'></td>";		
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Tipo:</font></td>";
			text	+=" 						<td>";
			text	+="								<select name='tipoEquipamento'>";
			text	+="									<option>DataShow</option>";
			text	+="									<option>Filtro de Finha</option>";
			text	+="									<option>Retroprojetor</option>";
			text	+="									<option>Gabinete</option>";
			text	+="									<option>Estabilizador</option>";
			text	+="								</select>";			
			text	+="							</td>";
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Estado:</font></td>";
			text	+="							<td>";
			text	+="								<select name='estadoEquipamento'>";
			text	+="								<option>Bom</option>";
			text	+="								<option>Quebrado</option>";
			text	+="								</select>";
			text	+="							</td>";
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td valign=top align=right><font face='Arial'> Obs.:</font></td>";
			text	+="							<td>";
			text	+="								<textarea name=observ cols=25 rows=3></textarea>";
			text	+="							</td>";	
			text	+="						</tr>";
			text	+="						<tr>";
			text	+="							<td colspan=3 align=center>";
			text	+="								<input type='submit' value='Salvar'>";
			text	+="							</td>";	
			text	+="						</tr>";
			text	+="					</table>";
			text	+="				</form>";
			text	+="			</div>";
			equip.innerHTML=text;
			
			
		}
		
		</script>
		
</head>
<body onload="javascript:cadastrar()">


<div id="topo">
    	<ul>
        	<li><a> Sala</a></li>
            <li><a> Equipamento</a></li>
            <li><a> Material</a></li>
    	</ul>
    	<a id="logout"> Logout</a>  
    </div>
<div id="site">
	<div id="menu">
        <fieldset>
        	<legend><h1>Menu</h1></legend>
        	<ul>
            	<li><a href="javascript:cadastrar()">Cadastrar</a></li>
                <li><a href="javascript:alterar()">Alterar</a></li>
                <li><a href="javascript:emprestar()">Emprestar</a></li>
                <li><a href="javascript:devolucao()">Devolução</a></li>
            </ul>
        </fieldset>
	</div>
	<div id="sala">
        	<fieldset id="equip">
            </fieldset>
        </div>
</div>
</body>
</html>