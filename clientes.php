<?php

if($_SESSION['logado'] != 'sim'){
	header('Location:index.php');
}
include "cls/clientesClass.php";
$cliente = new clientesClass();
$cliente -> mostrar();
$active = 'clientes';
?>
<div align ="center">
	<table border ="1">
		<tr>
		<td align="center" style = "background-color:yellow;">ID</td>
		<td align="center" style = "background-color:yellow;">Nome</td>
		<td align="center" style = "background-color:yellow;">Endereco</td>
		<td align="center" style = "background-color:yellow;">Email</td>
		<td style = "background-color:yellow;">   Editar   </td>
		<td style = "background-color:yellow;">   Deletar   </td>
		<td style = "background-color:yellow;">   Mostrar pagamentos   </td>
		</tr>
		<?php 
			while($linha = mysql_fetch_array($cliente -> getconsulta())){
		?>
		<tr>
			<td align="center"><? echo $linha['idCliente'];?></td>
			<td align="center"><? echo $linha['nome'];?></td>
			<td align="center"> <?echo $linha['endereco']?></td>
			<td align="center"><? echo $linha['email'];?></td>
			<td align="center"><a href = 'principal.php?m=a&id=<?=$linha['idCliente']?>'>Editar</a></td>
			<td align="center"><a href = "javascript:deletar(<?=$linha['idCliente']?>, '<?=$linha['nome']?>');">Deletar</a></td>
			<td align="center"><a href = "principal.php?m=mp&id=<?=$linha['idCliente']?>">Mostrar pagamentos</a></td>
		</tr>
		<?php }?>
	</table>
</div>

<script type ="text/javascript">
	function deletar(id, nome){
		var del = confirm('Você realmente deseja deletar o cliente ' + nome +'?');
		if (del){
			location.href = 'deletarCliente.php?id='+id;

		}
		
	}
	
		</script>
