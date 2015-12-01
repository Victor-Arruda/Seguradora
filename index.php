<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />

	<title>Login de Usuário</title>
</head>
<body>
	<div align="center">
		<form action="valida.php" method="POST">
			<table>
				<tr>
					<td>
						Login:<input type="text" name="login" placeholder="Digite seu Login" required><br>
					</td>
				</tr>
				<tr>
					<td>
						Senha:<input type="password" name="senha" placeholder="Digite sua Senha" required>
					</td>
				</tr>
				<tr>
					<td align="center">
						<input type="submit" value="OK"> <input type="reset" value="Limpar">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>