<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/segurosClass.php';
	require_once 'cls/clientesClass.php';
	$seguro = new segurosClass();
	$seguro->mostrar();
	$cliente = new clientesClass();
	$cliente -> mostrar();
	$active = 'seguros';
	?>

<!DOCTYPE html>
<html>
<head>
	<title> Novo Seguro</title>
</head>
<body>
	<form class="form-horizontal" id = "form" method="POST" action='processarSeguro.php'>
<fieldset>

<!-- Form Name -->
<legend align = "center">Cadastro de Seguros</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cliente">Cliente</label>
  <div class="col-md-2">
    <select id="cliente" name="cliente" class="form-control">
       <option value = "---------------"></option>
		<?php
			while ($linha = mysql_fetch_array($cliente->getconsulta())) 
				{
				?>
				<option value="<?=$linha['idCliente']?>"><?echo $linha['nome']?> - <? echo $linha['cpf_cnpj']?></option>	
		<?php }?>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataInicio">Data de Início</label>  
  <div class="col-md-2">
  <input id="dataInicio" name="dataInicio" type="date"  class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataVencimento">Data de Vencimento</label>  
  <div class="col-md-2">
  <input id="dataVencimento" name="dataVencimento" type="text" placeholder="placeholder" class="form-control input-md" required="">
  <span class="help-block">(Dia do Mês)</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="precoMensal">Preço Mensal</label>  
  <div class="col-md-2">
  <input id="precoMensal" name="precoMensal" type="number" step = "0.01" placeholder = "0,00" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo">Tipo de Seguro</label>
  <div class="col-md-2">
    <select id="tipo" name="tipo" class="form-control">
      <option value="1">Aeronáutico</option>
		<option value="2">Auto</option>
		<option value="3">Condomínio</option>
		<option value="4">Consórcio</option>
		<option value="5">Empresarial</option>
		<option value="6">Equipamentos Portáteis</option>
		<option value="7">Fiança Locatícia</option>
		<option value="8">Garantia</option>
		<option value="9">Multirrisco</option>
		<option value="10">Náutico</option>
		<option value="11">Odontológico</option>
		<option value="12">Previdência Privada</option>
		<option value="13">Residencial</option>
		<option value="14">Responsabilidade Civil</option>
		<option value="15">Riscos de Engenharia</option>
		<option value="16">Riscos Diversos</option>
		<option value="17">Rural</option>
		<option value="18">Saúde</option>
		<option value="19">Transportes</option>
		<option value="20">Vida</option>
    </select>
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