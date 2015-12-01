<?php
	require_once 'conexaoClass.php';
	
	class pagamentosClass{
		var $id;
		var $data_pagamento;
		var $id_seguro;
		var $resultado;
		
		public function mostrar()
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "select * from Pagamentos";
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());
		}
		public function buscarPorCliente($id_do_cliente){
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "select * from pagamentos_do_cliente where id_c = " . $id_do_cliente; #AQUI
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());			
			echo mysql_error();
		}
		public function getConsulta()
		{
			return $this -> resultado;
		}
		
		public function buscarUm($idPagamentos){
				
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "select * from Pagamentos where idPagamentos = $idPagamentos";
			$this -> resultado = mysql_query($sql, $conn -> getconn());
		}
		
		public function efetuarPagamento($dataPagamento, $idSeguro){
			$conn = new conexaoClass();
			$conn -> abrir_conexao();
			$sql = "call efetuar_pagamento('$dataPagamento', $idSeguro)"; #AQUI
			$this -> resultado = mysql_query($sql, $conn -> getconn());
			echo mysql_error();
			echo $sql;
		}
	}
?>