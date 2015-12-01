<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	include 'cls/segurosClass.php';
	$seguro = new segurosClass();
	$seguro -> novoSeguro($_POST['dataInicio'], $_POST['dataVencimento'], $_POST['precoMensal'], '1', $_POST['tipo'], $_POST['cliente']);
	
	header('Location:principal.php?m=c');

?>