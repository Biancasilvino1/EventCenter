<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id, nome, cpf, telefone, endereco, email, senha FROM clientes WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['cpf'] = $row_usuario['cpf'];
				$_SESSION['telefone'] = $row_usuario['telefone'];
				$_SESSION['endereco'] = $row_usuario['endereco'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['senha'] = $row_usuario['senha'];
				header("Location: administrativo.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: index.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: index.php");
}
