<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/clientesClass.php';
	$cliente = new clientesClass();
	$cliente -> editarCliente($_POST['nome'], $_POST['endereco'], $_POST['telefone'], $_POST['tipoCliente'], $_POST['email'], $_POST['cpf_cnpj'], $_POST['id']);
	header('Location:principal.php?m=x');
?>