<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])){
	//echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	//echo "<a href='sair.php'>Sair</a><br>";
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: index.php");	
}

//Consulta ao BD
?>

<?php
	$select = "select id, nome from tipodeevento";
	$lista_tipodeeventos = mysqli_query($conn, $select);
	if(!$lista_tipodeeventos){
		die("Falha na conexao");
	}
	
	$selectservico = "select id, nome from servicos";
	$lista_servico = mysqli_query($conn, $selectservico);
	if(!$lista_servico){
		die("Falha na conexao");
	}
?>

<?php
	
	if(isset($_POST["tipodeevento"])) {
		$nome = $_SESSION['id'];
		$nome = $select["id"];
		$servicos = $_POST["servico"];
		
		$inserir = "insert into compras (cliente_id, tipodeevento_id, servico_id) values ($nome, $servico, $servicos)";
		$operacao_inserir = mysqli_query($conn, $inserir);
		if(!$operacao_inserir){
			die("Falha no BD");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EventCenter</title>
	
	<link rel="stylesheet" href="css/bootstrap.css">
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

  </head>

  <body>
	<div class="container">

		<h2>Entraremos em contato!</h2>
		<h5>Voltar para a área de serviços <a href="comprar.php">Serviços</a></h5>
	</div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">EventCenter &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery02.min.js"></script>
    <script src="js/bootstrap02.bundle.min.js"></script>
	<script src="js/bootstrap.min"></script>
  </body>
</html>