<?php
	require_once 'cls/pagamentosClass.php';
	$pagamentos_class = new pagamentosClass();
	$pagamentos_class->buscarPorCliente($_GET['id']);
?>
<div align = center>
<fieldset>
<legend id = "qual"></legend>

<table border = 2>
	<tr>
		<td style = "background-color:yellow;">Data de Pagamento</td>
		<td style = "background-color:yellow;">Tipo de seguro</td>
	</tr>
	<?php
		while($linha = mysql_fetch_array($pagamentos_class -> getConsulta())){
	?>
	<tr>
		<td><?php echo date('d/m/Y', strtotime($linha['data_pagamento']));?></td>
		<td><?switch ($linha['tipo']){
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
	</tr>
	<?php
	$nome = $linha['nome'];
	 }?>
</table>
</fieldset>
</div>
<script type = "text/javascript">
	document.getElementById('qual').innerHTML = "Pagamentos do <?=$nome ?>"
</script>