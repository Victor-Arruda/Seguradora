<?php


if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}

require_once 'cls/clientesClass.php';
$cli = new clientesClass();
$cli-> buscarUm($_GET['id']);
$cliente = mysql_fetch_array($cli -> getconsulta());
$active = 'clientes';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Atualizar Cliente</title>
</head>
<body>
<form class="form-horizontal" method = POST action = 'processarAtualizarClientes.php'>
<fieldset>

<!-- Form Name -->
<legend align = "center">Atualizar Cliente</legend>
<input type = hidden name = id value = <?=$cliente['idCliente']?>>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-2">
  <input id="nome" name="nome" type="text" value = "<?=$cliente['nome']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="endereco">Endereço</label>  
  <div class="col-md-2">
  <input id="endereco" name="endereco" type="text" value = "<?=$cliente['endereco']?>" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-2">
  <input id="email" name="email" type="text" value = "<?=$cliente['email']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-2">
  <input id="telefone" name="telefone" type="text" value = "<?=$cliente['telefone']?>" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Tipo</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="tipoCliente" id="radios-0" value="1" checked="checked" onchange="paraCPF()">
      Pessoa Física
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="tipoCliente" id="radios-1" value="2" onchange="paraCNPJ()">
      Pessoa Jurídica
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label id = "texto" class="col-md-4 control-label" for="cpf_cnpj">CPF</label>  
  <div class="col-md-2">
  <input id="cpf_cnpj" name="cpf_cnpj" pattern = "^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" type="text" value = "<?=$cliente['cpf_cnpj']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="atualizar"></label>
  <div class="col-md-8">
    <button id="atualizar" name="atualizar" class="btn btn-success">Atualizar</button>
    <button id="cancelar" type = "button" onclick= "getBack()" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
<script type ="text/javascript"> 
	function paraCNPJ(){
		document.getElementById('cpf_cnpj').pattern = '^[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}$';
		document.getElementById('texto').innerHTML = 'CNPJ';
		document.getElementById('cpf_cnpj').placeholder = 'Digite seu CNPJ';
	}

	function paraCPF(){
		document.getElementById('cpf_cnpj').pattern = '^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$';
		document.getElementById('texto').innerHTML = 'CPF';
		document.getElementById('cpf_cnpj').placeholder = 'Digite seu CPF';
	}
	function mascara(telefone){ 
		   if(telefone.value.length == 0)
		     telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
		   if(telefone.value.length == 3)
		      telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.

		 if(telefone.value.length == 9)
		     telefone.value = telefone.value + '-'; //quando o campo já tiver 9 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
		 
		}
	function getBack(){
		window.history.back();
	}
</script>
</body>
</html>