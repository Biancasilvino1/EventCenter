<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM clientes WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.css" >
		<link rel="stylesheet" href="css/signin.css">
	</head>
	<body>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		
		<form method="POST" action="proc_edit_usuario.php" class="form-signin">
			
			<h1>Editar Usuário</h1>
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>Cpf: </label>
			<input type="cpf" name="cpf" placeholder="Digite o seu cpf" value="<?php echo $row_usuario['cpf']; ?>"><br><br>
			
			<label>Telefone: </label>
			<input type="telefone" name="telefone" placeholder="Digite o seu telefone" value="<?php echo $row_usuario['telefone']; ?>"><br><br>
			
			<label>Endereço: </label>
			<input type="endereco" name="endereco" placeholder="Digite o seu endereco" value="<?php echo $row_usuario['endereco']; ?>"><br><br>
			
			<label>Email: </label>
			<input type="email" name="email" placeholder="Digite o seu email" value="<?php echo $row_usuario['email']; ?>"><br><br>
			
			<label>Usuário: </label>
			<input type="usuario" name="cpf" placeholder="Digite o seu usuario" value="<?php echo $row_usuario['usuario']; ?>"><br><br>
			
			<label>Senha: </label>
			<input type="senha" name="senha" placeholder="Digite o seu senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>
			
			<input type="submit" value="Editar" class="btn btn-lg btn-primary btn-block">
			<a href="cadastrar.php">Cadastrar</a><br>
		</form>
	</body>
</html>
