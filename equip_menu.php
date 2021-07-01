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
		
		<script type="text/javascript" src="app.js/equip_script.js"></script>
		
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