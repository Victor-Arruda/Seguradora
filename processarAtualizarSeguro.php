<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/segurosClass.php';
	$seguro = new segurosClass();
	$seguro -> atualizarSeguro($_POST['dataVencimento'],$_POST['precoMensal'], $_POST['status'], $_POST['id']);
	header('Location:principal.php?m=c');
?>