<?php
	require_once 'conexaoClass.php';

	class clientesClass
	{
		var $id;
		var $nome;
		var $endereco;
		var $telefone;
		var $email;
		var $tipo;
		var $cpf_cnpj;
		var $resultado;

		public function mostrar()
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "select * from Clientes";
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());
		}

		public function getconsulta()
		{
			return $this -> resultado;
		}

		public function buscarUm($idCliente){
			
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "select * from Clientes where idCliente = $idCliente";
			$this -> resultado = mysql_query($sql, $conn -> getconn());
		}

		public function cadastrar($nome, $endereco, $telefone, $tipo, $email, $cpf_cnpj){
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
	/*AQUI*/$sql = "call cadastro_cliente('$nome', '$endereco', '$telefone', '$tipo', '$email', '$cpf_cnpj')";
			mysql_query($sql, $conn -> getconn());
		}
		
		public function editarCliente($nome, $endereco, $telefone, $tipo, $email, $cpf_cnpj, $id){
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "update Clientes set nome = '$nome', endereco = '$endereco', telefone = '$telefone', tipo = '$tipo', email = '$email', cpf_cnpj = '$cpf_cnpj' where idCliente = $id";
			mysql_query($sql, $conn -> getconn());
		}
		
		public function deletar($id){
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "delete from Clientes where idCliente = $id";
			mysql_query($sql, $conn -> getconn());
			echo mysql_error();
		}
	}
?>