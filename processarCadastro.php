<?php


if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
include "cls/clientesClass.php";
$cliente = new clientesClass();
$cliente -> cadastrar($_POST['nome'], $_POST['endereco'], $_POST['telefone'], $_POST['tipoCliente'], $_POST['email'], $_POST['cpf_cnpj']);

header('Location:principal.php?m=x');

?>