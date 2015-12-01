<?php
	require_once 'conexaoClass.php';

	class segurosClass{
		var $id;
		var $data_inicio;
		var $data_vencimento;
		var $preco_mensal;
		var $status;
		var $tipo;
		var $idCliente;
		var $resultado;
		

		public function novoSeguro($data_inicio, $data_vencimento, $preco_mensal, $status, $tipo, $idCliente){
			$conn = new conexaoClass();
			$conn->abrir_conexao();
			$sql = "insert into Seguros (data_inicio, data_vencimento, preco_mensal, status, tipo, idCliente) values ('$data_inicio', '$data_vencimento', '$preco_mensal', '$status', '$tipo', '$idCliente')";
			mysql_query($sql, $conn->getconn());
			echo mysql_error();
		}
		
		public function buscarUm($idSeguro){
				
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "select Seguros.*, Clientes.nome, Clientes.cpf_cnpj from Seguros, Clientes where idSeguros = $idSeguro and Seguros.idCliente = Clientes.idCliente";
			$this -> resultado = mysql_query($sql, $conn -> getconn());
			
		}
		
		public function getconsulta()
		{
			return $this -> resultado;
		}

		public function mostrar()
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "select nome, cpf_cnpj,Seguros.idSeguros, Seguros.tipo, preco_mensal, data_vencimento from Seguros, Clientes where Seguros.idCliente = Clientes.idCliente";
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());
		}
		
		public function atualizarSeguro($data_vencimento, $preco_mensal, $status, $id){
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
	/*AQUI*/$sql = "call altera_seguro ('$data_vencimento', $preco_mensal, '$status', $id)";
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());
			
		}
		
		
	}
?>