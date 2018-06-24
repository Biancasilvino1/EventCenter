<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>EventCenter-Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap" >
		<link rel="stylesheet" href="css/signin">
	</head>
	<body>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
		?>
		<form method="POST" action="valida.php" class="form-signin">
			<h1>Área de Login</h1>
			<h2 class="h3 mb-3 font-weight-normal">Entre com usuario e senha</h2>
			<!--label>Usuário</label-->
			<input type="text" name="usuario" placeholder="Digite o seu usuário" class="form-control" required autofocus><br>
			
			<!--label>Senha</label-->
			<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control" required autofocus><br>
			
			<input type="submit" name="btnLogin" value="Acessar" class="btn btn-lg btn-primary btn-block">
			
			<h4>Você ainda não possui uma conta?</h4>
			<a href="cadastrar.php">Crie grátis</a>
		</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="js/bootstrap.min"></script>
	</body>
</html>
