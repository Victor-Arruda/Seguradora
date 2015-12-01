<?php

require_once 'cls/clientesClass.php';
$cli = new clientesClass();
$cli-> buscarUm($_GET['id']);
$cliente = mysql_fetch_array($cli -> getconsulta());

?>

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
      <input type="radio" name="tipoCliente" id="radios-0" value="1" checked="checked">
      Pessoa Física
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="tipoCliente" id="radios-1" value="2">
      Pessoa Jurídica
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf_cnpj">CPF/CNPJ</label>  
  <div class="col-md-2">
  <input id="cpf_cnpj" name="cpf_cnpj" type="text" value = "<?=$cliente['cpf_cnpj']?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="atualizar"></label>
  <div class="col-md-8">
    <button id="atualizar" name="atualizar" class="btn btn-success">Atualizar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>