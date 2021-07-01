		

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
			text	+="		<div id='selec1'>";
			text	+="			<form name='form_emprestar' method='post' action='app.control/emprestarEquip.php'>";
			text	+="				<table width='70%'  border='0'>";
			text	+="					<tr>";
			text	+="						<td height='10px' valign=top><font face='Arial'> Professor:</font></td>";
			text	+="						<td><input type='text' value='' name='nomeProfessor' size='20'></td>";
			text	+="					</tr>";
			text	+="					<tr>";
			text	+="						<td valign=top><font face='Arial'> Código do Equip.:</font></td>";
			text	+="						<td> <input type='text' value='' name='codigoEquipamento' size='20'></td>";
			text	+="					</tr>";
			text	+="					<tr>";
			text	+="						<td valign=top><font face='Arial'> Hora da Reversa:</font></td>";
			text	+="						<td><input type='text' value='' name='horaReserva' size='20'></td>";
            text	+="					</tr>";
            text	+="					<tr>";
            text	+="						<td valign=top><font face='Arial'> Hora da Devolução:</font></td>";
            text	+="						<td><input type='text' value='' name='horaDevolucao' size='20'></td>";
            text	+="					</tr>";
            text	+="					<tr>";
            text	+="						<td valign=top><font face='Arial'> Data:</font></td>";
            text	+="						<td><input type='text' value='' id='campoData' name='dataEmprestimo' size='20'></td>";
            text	+="					</tr>";
            text	+="					<tr>";
            text	+="						<td colspan='2' align='center'><input type='submit' value='Emprestar'></td>";
            text	+="					</tr>";
            text	+="				</table>";
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
			text	+=" 					<table id=table_alterar>";
			text	+="							<tr  bgcolor='#999'  align='Center'>";
			text	+="								<th>Equipamento</th>";
			text	+="								<th>Código</th>";
			text	+="								<th>Estado</th>";
			text	+="								<th>Observações</th>";
			text	+="								<th>Alterar</th>";
			text	+="							</tr>";
			text	+="						</table>";
			text	+="					</form>"
			text	+=" 		 	</div>";
			
			equip.innerHTML=text;
			
			var xmlhttp;
			if (window.XMLHttpRequest)
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else if (window.ActiveXObject)
			{
				// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			else
			{
				alert("Your browser does not support XMLHTTP!");
				return;
			}
			
			// Carrega a função de execução do AJAX
			xmlhttp.onreadystatechange = function() 
			{
	
				if(xmlhttp.readyState == 4)
				{ 
					// Quando estiver completado o Carregamento
					var resultados = xmlhttp.responseXML;
					var equipamentos = resultados.getElementsByTagName("equipamento");
					var tabela = document.getElementById("table_alterar");
					var text="";
					alert(equipamentos.length);
					for(var i=0;i<equipamentos.length;i++){
						text+="<form method='post' action='alterarForm_equip.php?id='"+equipamentos[i].getAttribute("idEquip")+"''>";
						text+="<tr>";
							text+="<td>"+equipamentos[i].getAttribute("tipo") +"</td>";
							text+="<td>"+equipamentos[i].getAttribute("codigo") +"</td>";
							text+="<td>"+equipamentos[i].getAttribute("estado") +"</td>";
							text+="<td>"+equipamentos[i].getAttribute("observacao") +"</td>";
						text+="</tr>";
						text+="</form>";
						}
					tabela.innerHTML += text; 
				}
			};
			// Envia via método GET as informações
			xmlhttp.open("GET","buscarEquipXML.php",true);
	    	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1") 
			xmlhttp.send(null);
			
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