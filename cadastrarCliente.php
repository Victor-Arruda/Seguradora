<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
include "cls/clientesClass.php";
$cliente = new clientesClass();
$cliente -> mostrar();
$active = 'clientes';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Novo Cliente</title>
</head>
<body>
<form class="form-horizontal" method = POST action = 'processarCadastro.php'>
<fieldset>

<!-- Form Name -->
<legend align = "center">Cadastrar Cliente</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="col-md-2">
  <input id="nome" name="nome" type="text" placeholder="Digite o Nome do Cliente" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="endereco">Endereço</label>  
  <div class="col-md-2">
  <input id="endereco" name="endereco" type="text" placeholder="DIgite o Endereço" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-2">
  <input id="email" name="email" type="email" placeholder="Digite o e-mail" class="form-control input-md" required="">
   <span class="help-block">seuemail@exemplo.com</span>   
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-2">
  <input id="telefone" name="telefone" onkeypress="mascara(this)" type="text" placeholder="Digite o Telefone" class="form-control input-md">
    <span class="help-block">(00)0000-0000</span>  
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
  <input id="cpf_cnpj" name="cpf_cnpj" pattern = "^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" type="text" placeholder="Digite o CPF" class="form-control input-md" required>
    <span class="help-block">000.000.000-00 <br>ou<br>00.000.000/0000-00</span>  
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cadastrar"></label>
  <div class="col-md-8">
    <button id="cadastrar" name="cadastrar" class="btn btn-success">Cadastrar</button>
    <button id="cancelar" type = "button" onclick = "getBack()" name="cancelar" class="btn btn-danger">Cancelar</button>
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
		     telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.
		 
		}
	function getBack(){
		window.history.back();
	}
</script>
</body>
</html>

