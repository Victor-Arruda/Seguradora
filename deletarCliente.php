<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
require_once "cls/clientesClass.php";
$cliente = new clientesClass();
$cliente -> mostrar();

if(isset($_GET['id'])){
	$cliente = new clientesClass();
	$cliente->deletar($_GET['id']);
}

header('Location:principal.php?m=x');
?>