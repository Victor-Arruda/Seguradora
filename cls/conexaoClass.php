<?php
	class conexaoClass
	{
		var $conn;

		function abrir_conexao()
			{
				$server  = 'localhost';
				$usuario = 'root';
				$senha = '';
				$banco = 'Corretora';


				$this -> conn = mysql_connect($server,$usuario, $senha);
				mysql_select_db($banco, $this->conn);
				mysql_set_charset("utf8", $this->conn);
			}

		function getconn()
			{
				return $this -> conn;
			}
	}
?>