<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
	include 'cls/segurosClass.php';
	$seguro = new segurosClass();
	$seguro -> mostrar();
	$active = 'seguros';
?>

<div align = "center">
	<table border ="1">
		<tr>
			<td style = "background-color:yellow;" align="center">Cliente</td>
			<td style = "background-color:yellow;" align="center">Seguro</td>
			<td style = "background-color:yellow;" align="center">Valor</td>
			<td style = "background-color:yellow;" align="center">Data de Vencimento</td>
			<td style = "background-color:yellow;" align ="center">Editar</td>
		</tr>
		<?php 
			while($linha = mysql_fetch_array($seguro -> getconsulta())){
		?>
		<tr>
			<td align="center"><? echo $linha['nome'];?></td>
			<td align="center"> <?php switch ($linha['tipo']){
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
			<td align="center"> <?echo $linha['preco_mensal']?></td>
			<td align="center"><? echo $linha['data_vencimento'];?></td>
			<td align="center"><a href = 'principal.php?m=e&id=<?=$linha['idSeguros']?>'>Editar</a></td>
		</tr>
		<?php }?>
	</table>
</div>