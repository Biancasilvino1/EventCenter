<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>EventCenter-Listar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap" >
		<link rel="stylesheet" href="css/signin">
	</head>
	<body class="form-signin">
		<form method="POST">
			<h1>Lista de Usuários</h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
			
			$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
			
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
			$qtd_result_pg = 2;
			
			$inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;
			
			$result_usuarios = "SELECT * FROM clientes LIMIT $inicio, $qtd_result_pg";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "Nome: " . $row_usuario['nome'] . "<br>";
				echo "CPF: " . $row_usuario['cpf'] . "<br>";
				echo "Telefone: " . $row_usuario['telefone'] . "<br>";
				echo "Endereço: " . $row_usuario['endereco'] . "<br>";
				echo "E-mail: " . $row_usuario['email'] . "<br>";
				echo "Usuário: " . $row_usuario['usuario'] . "<br>";
				echo "Senha: " . $row_usuario['senha'] . "<br><hr>"; 
			}
			
			$result_pg = "SELECT COUNT(id) AS num_result FROM clientes";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];
			//Qtd pg
			$quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
			//limitar os links entes e depois
			$max_links = 2;
			echo "<a href = 'listar.php?pagina=1'> Primeira </a>";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
				if($pag_ant >= 1){
					echo "<a href = 'listar.php?pagina=$pag_ant'> $pag_ant </a>";
				}
			}
				
			echo "$pagina";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href = 'listar.php?pagina=$pag_dep'> $pag_dep </a>";
				}
			}
			
			echo "<a href = 'listar.php?pagina=$quantidade_pg'> Ultima </a>";
			?>
		</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="js/bootstrap.min"></script>
	</body>
</html>