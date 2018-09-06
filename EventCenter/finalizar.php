<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
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
		$evento = $_POST["tipodeevento"];
		$servicos = $_POST["servico"];
		
		$inserir = "insert into compras (cliente_id, tipodeevento_id, servico_id) values ($nome, $evento, $servicos)";
		$operacao_inserir = mysqli_query($conn, $inserir);
		if(!$operacao_inserir){
			die("Falha no BD");
		}
		header("Location: fim.php");
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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">EventCenter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="administrativo.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="comprar.php">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sair.php">Deslogar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
	
    <div class="container">

		<h1 class="my-4 text-center text-lg-left">Cadastre seu pedido </h1>
		
		<form method="POST" action="" class="form-signin" >
				<h2></h2>
				
				<label>Selecione seu tipo de evento</label><br>
				<select name="tipodeevento">
					<?php
						while($linha = mysqli_fetch_assoc($lista_tipodeeventos)) {
					?>
						<option value="<?php echo $linha["id"]?>"> <?php echo $linha["nome"]?></option>
					<?php
						}
					?>
				</select><br><br>
				
				<label>Selecione o tipo de serviço</label><br>
				<select name="servico">
					<?php
						while($linha = mysqli_fetch_assoc($lista_servico)) {
					?>
						<option value="<?php echo $linha["id"]?>"> <?php echo utf8_encode($linha["nome"])?></option>
					<?php
						}
					?>
				</select><br><br>					
				
				<input class="btn btn-lg btn-primary btn-block col-lg-3 col-md-4 col-xs-6" type="submit" name="finalizar" value="Finalizar"><br>
				
			</form>
		
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