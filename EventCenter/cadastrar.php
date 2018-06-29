<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO clientes (nome, cpf, telefone, endereco, email, usuario, senha) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['cpf']. "',
					'" .$dados['telefone']. "',
					'" .$dados['endereco']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "'
					)";
	$resultado_usario = mysqli_query($conn, $result_usuario);
	if(mysqli_insert_id($conn)){
		$_SESSION['msgcad'] = "<p style='color: blue;'>Usuário cadastrado com sucesso </p>";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuário";
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/signin.css">
		<title>EventCenter-Cadastrar </title>
	</head>
		<body>
				
			<?php
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			<form method="POST" action="" class="form-signin" >
				<h2>Ficha de Cadastro </h2>
				
				<!--label>Nome</label-->
				<input type="text" name="nome" placeholder="Digite o nome e o sobrenome" class="form-control" required autofocus><br>
				
				<!--label>Cpf</label-->
				<input type="text" name="cpf" placeholder="Digite o cpf" class="form-control" required autofocus><br>
				
				<!--label>Telefone</label-->
				<input type="text" name="telefone" placeholder="Digite o telefone" class="form-control" required autofocus><br>
				
				<!--label>Endereço</label-->
				<input type="text" class="form-control" name="endereco" placeholder="Digite o endereço" required autofocus><br>
				
				<!-- label>E-mail</label -->
				<input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control" required autofocus><br>
				
				<!--label>Usuario</label-->
				<input type="text" name="usuario" placeholder="Digite seu usuario" class="form-control" required autofocus><br>
				
				<!--label>Senha</label-->
				<input type="text" name="senha" placeholder="Digite sua senha" class="form-control" required autofocus><br>						
				
				<input class="btn btn-lg btn-primary btn-block" type="submit" name="btnCadUsuario" value="Cadastrar"><br>
				
				Voltar para a área de <a href="login.php">Login</a>
				
			</form>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
			<script src="js/bootstrap.min"></script>
				
		</body>	
</html>
