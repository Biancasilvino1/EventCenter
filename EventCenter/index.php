<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>EventCenter-Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="css/signin.css" type="text/css">
		<style>
			body {
				background-image: url("09.jpg");
				background-attachment: fixed;
				background-repeat: no-repeat;
				background-size:100%;
				background-repeat: round;
			}
		</style>
	</head>
	
	<body class="form-signin">
		
		<form method="POST" action="valida.php">
			
			<h1 style="color:LightCyan"> EventCenter</h1>
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
			<h5 style="color:black">Área de Login</h5>
			<!--<h4 class="h3 mb-3 font-weight-normal"> Entre com usuario e senha</h4>-->
			<!--label>Usuário</label-->
			<input type="text" name="usuario" placeholder="Digite o seu usuário" class="form-control" required autofocus><br>
			
			<!--label>Senha</label-->
			<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control" required autofocus><br>
			
			<input type="submit" name="btnLogin" value="Acessar" class="btn btn-lg btn-primary btn-block">
			
			<h4>Você ainda não possui uma conta? <a style="color:MidnightBlue" href="cadastrar.php">Crie grátis</a></h4>
			
		</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
		
</html>