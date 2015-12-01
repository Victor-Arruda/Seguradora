<?php
session_start();
if(isset($_POST) && isset($_POST['login'])){
	include ('cls/admClass.php');
	$usuario = new admClass();
	$logar = $usuario->validar($_POST['login'], $_POST['senha']);
	if($logar == false){
		echo "<h1 align = center> Dados de usuário incorretos <br> <a href = index.php>Voltar </a></h1>";
	}else{
		$_SESSION['logado'] = 'sim';
		$_SESSION['login'] = $_POST['login'];
		header('Location:principal.php');
	}
}
?>