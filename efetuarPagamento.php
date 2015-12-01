<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/pagamentosClass.php';
	require_once 'cls/segurosClass.php';
	$pagamento = new pagamentosClass();
	$pagamento -> mostrar();
	$seguro = new segurosClass();
	$seguro -> mostrar();
	$active = 'seguros';
	
?>

<!DOCTYPE html>
<html>
<head>
	<title> Efetuar Pagamento</title>
</head>
<body>
	<form class="form-horizontal" id = "form" method="POST" action='processarPagamento.php'>
<fieldset>

<!-- Form Name -->
<legend align = "center">Efetuar Pagamento</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cliente">Cliente</label>
  <div class="col-md-2">
    <select id="cliente" name="cliente" class="form-control">
       <option value = "---------------"></option>
		<?php
			while ($linha = mysql_fetch_array($seguro->getconsulta())) 
				{
				?>
				<option value="<?=$linha['idSeguros']?>"><?echo $linha['nome']?> - <? echo $linha['cpf_cnpj']?> - <?switch ($linha['tipo']){
				case "1":
					echo ("Aeronáutico");
					break;
				case "2":
					echo ("Auto");
					break;
				case "3":
					echo ("Condomínio");
					break;
				case "4":
					echo ("Consórcio");
					break;
				case "5":
					echo ("Empresarial");
					break;
				case "6":
					echo ("Equipamentos Portáteis");
					break;
				case "7":
					echo ("Fiança Locatícia");
					break;
				case "8":
					echo ("Garantia");
					break;
				case "9":
					echo ("Multirrisco");
					break;
				case "10":
					echo ("Náutico");
					break;
				case "11":
					echo ("Odontológico");
					break;
				case "12":
					echo ("Previdência Privada");
					break;
				case "13":
					echo ("Residencial");
					break;
				case "14":
					echo ("Responsabilidade Civil");
					break;
				case "15":
					echo ("Riscos de Engenharia");
					break;
				case "16":
					echo ("Riscos Diversos");
					break;
				case "17":
					echo ("Rural");
					break;
				case "18":
					echo ("Saúde");
					break;
				case "19":
					echo ("Transportes");
					break;
				case "20":
					echo ("Vida");
					break;
			}?></option>	
		<?php }?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataPagamento">Data de Pagamento</label>  
  <div class="col-md-2">
  <input id="dataPagamento" name="dataPagamento" type="date"  class="form-control input-md" required="">
    
  </div>
</div>


<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" type = "button" name="button1id" onclick="verificar()" class="btn btn-success">Salvar</button>
    <button id="button2id" type = "button" onclick="getBack()" name="button2id" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
	<script type="text/javascript">
		function verificar(){
			var cliente = document.getElementById('cliente');

			if(cliente.options[cliente.selectedIndex].text == ''){
				alert('Selecione um Cliente, por favor!');
			}else{
				var botao = document.getElementById('button1id');
				botao.type='submit';
				botao.click();
			}
		}
		function getBack(){
			window.history.back();
		}
	</script>
</body>
</html>