<?php

session_start();
if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
   
  </head>

  <body>
  
	
	<br>
	<br>
		<a href = "#VAIPRAHOME#"><img alt="logo" src="img/teste.png"></a>
  	<div class="container">
	      	<br>
	      	<br>
	      	<hr>
	      	<ul class="nav nav-pills" role="tablist">
	        <li id = "home" class=""><a href="?m=h">Home</a></li>
	        
	        <li class="dropdown" id = "clientes">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Clientes <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li class = ""><a href="?m=x">Mostrar</a></li>
	            <li><a href="?m=w">Novo</a></li>                      
	          </ul>
	        </li>
	        <li class="dropdown" id = "seguros">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Seguros <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="?m=y">Novo</a></li>
	            <li><a href="?m=c">Mostrar</a></li>    
	            <li><a href="?m=f">Efetuar Pagamento</a></li>                   
	          </ul>
	        </li>
	        <li id = "historico" class=""><a href="?m=d">Historico de Alterações</a></li>
	      </ul>
	      
	    </div>
	

	
		

		
		<br>
		<br>
		<br>
		<?php
	    	if(!isset($_GET['m']) && !isset($_POST['m']))
	    		require_once('principal.php');
	    	else{
	    		switch($_REQUEST['m']){
	    	
	    			case 'h':
	    				require_once('principal.php');
	    				break;
	    					
	    			case 'x':
	    				require_once('clientes.php');
	    				break;
	    					
	    			case 'w':
	    				require_once('cadastrarCliente.php');
	    				break;
	    	
	    			case 'y':
	    				require_once('novoSeguro.php');
	    				break;
	    	
	    			case 'a':
	    				require_once ('atualizarCliente.php'); 
	    				break;
	    			case 'b':
	    				require_once ('teste.php');
	    				break;
	    			case 'c':
	    				require_once ('seguros.php');
	    				break;
	    			case 'd':
	    				require_once 'historico.php';
	    				break;
	    			case 'e':
	    				require_once 'atualizarSeguro.php';
	    				break;
	    			case 'f':
	    				require_once 'efetuarPagamento.php';
	    				break;
    				case 'mp':
    					require_once 'mostrarPagamentoDoCliente.php';
    					break;
	    		}
	    	} 
	    	?>		
		
    <script type = "text/javascript" src="dist/jquery-1.11.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
   
   <!-- FOOTER -->
   <?php require_once 'footer.php'?>
  </body>

</html>
