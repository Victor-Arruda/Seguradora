<?php
	require_once 'conexaoClass.php';

	class historicoClass{
		var $id;
		var $data_modificacao;
		var $idSeguro;
		var $resultado;
		
		public function mostrar(){
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "select * from dados_para_historico";
			$this -> resultado = mysql_query($sql, $Oconn -> getconn());
		}
		
		public function getconsulta()
		{
			return $this -> resultado;
		}
	}
?>