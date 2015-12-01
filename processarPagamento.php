<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	require_once 'cls/pagamentosClass.php';
	$pagamento = new pagamentosClass();
	$pagamento -> efetuarPagamento($_POST['dataPagamento'], $_POST['cliente']);
	header('Location:principal.php')
?>