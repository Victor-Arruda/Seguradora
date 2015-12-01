<?php
	session_start();
	$_SESSION['logado'] = 'nao';
	header('Location:index.php');
?>