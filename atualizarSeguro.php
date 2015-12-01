<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/segurosClass.php';
	$seg = new segurosClass();
	$seg -> buscarUm($_GET['id']);
	$seguro = mysql_fetch_array($seg -> getconsulta());
	$active = 'seguros';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Seguro</title>
</head>
<body>
	<form class="form-horizontal" id = "form" method="POST" action='processarAtualizarSeguro.php'>
<fieldset>

<!-- Form Name -->
<legend align = "center">Alterar Seguro </legend>
<input type = hidden name = id value = <?=$seguro['idSeguros']?>>
<div align="center">
	Seguro do Cliente <?=$seguro['nome']?> - <?=$seguro['cpf_cnpj']?>
</div>
<br>
<br>
<br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataVencimento">Data de Vencimento</label>  
  <div class="col-md-2">
  <input id="dataVencimento" name="dataVencimento" type="text" value = "<?=$seguro['data_vencimento']?>" class="form-control input-md" required="">
  <span class="help-block">(Dia do Mês)</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="precoMensal">Preço Mensal</label>  
  <div class="col-md-2">
  <input id="precoMensal" name="precoMensal" type="number" step = "0.01"  value =<?=$seguro['preco_mensal']?> class="form-control input-md" required="">
    
  </div>
</div>
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Status</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="status" id="radios-0" value="1" checked="checked">
      Ativo
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="status" id="radios-1" value="2">
      Inativo
    </label>
	</div>
  </div>
</div>



<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="atualizar" name="atualizar" class="btn btn-success">Atualizar</button>
    <button id="button2id" type = "button" onclick="getBack()" name="button2id" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
	<script type="text/javascript">
		
		function getBack(){
			window.history.back();
		}
	</script>
</body>
</html>