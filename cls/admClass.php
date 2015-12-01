<?php
	include 'conexaoClass.php';

	class admClass{
		var $id;
		var $nome;
		var $login;
		var $senha;

		public function validar($login, $senha){
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "SELECT * from Administrador where login = '$login' and senha = '$senha'";
			$existe = mysql_query($sql, $conn -> getconn());
			if ($existe == false) {
				return false;
			}else{
				return mysql_fetch_array($existe);
			}
		}
	}
?>