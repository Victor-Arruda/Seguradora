<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	include 'cls/historicoClass.php';
	$historico = new historicoClass();
	$historico -> mostrar();
	$active = 'historico';
?>

<div align = "center">
	<table border = "1">
		<tr>
			<td align="center">Data de Modificação</td>
			<td align="center">Usuario que Modificou</td>
			<td align ="center">Descrição</td>
			<td align="center">Seguro</td>
			<td align="center">Cliente</td>
		</tr>
		<?php 
			while($linha = mysql_fetch_array($historico -> getconsulta())){
		?>
		<tr>
			<td align="center"><? echo date('d/m/Y', strtotime($linha['data_modificacao']));?></td>
			<td align="center"><? echo $linha['usuario'];?></td>
			<td align ="center"><? echo $linha['descricao'];?></td>
			<td align="center"> <?switch ($linha['tipo']){
				case "1":
					echo ("Aeronáutico");
					break;
				case "2":
					echo ("Auto");
					break;
				case "3":
					echo ("Condomínio");
					break;
				case "4":
					echo ("Consórcio");
					break;
				case "5":
					echo ("Empresarial");
					break;
				case "6":
					echo ("Equipamentos Portáteis");
					break;
				case "7":
					echo ("Fiança Locatícia");
					break;
				case "8":
					echo ("Garantia");
					break;
				case "9":
					echo ("Multirrisco");
					break;
				case "10":
					echo ("Náutico");
					break;
				case "11":
					echo ("Odontológico");
					break;
				case "12":
					echo ("Previdência Privada");
					break;
				case "13":
					echo ("Residencial");
					break;
				case "14":
					echo ("Responsabilidade Civil");
					break;
				case "15":
					echo ("Riscos de Engenharia");
					break;
				case "16":
					echo ("Riscos Diversos");
					break;
				case "17":
					echo ("Rural");
					break;
				case "18":
					echo ("Saúde");
					break;
				case "19":
					echo ("Transportes");
					break;
				case "20":
					echo ("Vida");
					break;
			}
			?></td>
			<td align="center"><? echo $linha['nome'];?> - <? echo $linha['cpf_cnpj']?></td>
		</tr>
		<?php }?>
	</table>
</div>