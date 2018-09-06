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
include_once("conexao.php");
$servico = "SELECT id, imagem, nome, maximodepessoas, valor FROM servicos";
$resultado = mysqli_query($conn, $servico);
if(!$resultado) {
	die("Falha na conexão");
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
              <a class="nav-link" href="#">Services</a>
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

		<h1 class="my-4 text-center text-lg-left">Contrate um serviço</h1>
		<div class="my-4 text-center text-lg-left col-lg-3 col-md-4 col-xs-6">
			<a class="btn btn-lg btn-primary btn-block" href="finalizar.php">Contrate um serviço </a>
		</div>
		<div class="row text-center text-lg-left">
		<?php
			while ($linha=mysqli_fetch_assoc($resultado)){
		?>
       
          <a href="<?php $linha["id"]?>" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src=" <?php echo $linha["imagem"] ?>" alt="">
			<h6>Serviço: <?php echo utf8_encode($linha["nome"]) ?></h6>
			<p>Qtd pessoas: <?php echo $linha["maximodepessoas"] ?></p>
			<p>Valor: <?php echo $linha["valor"] ?>R$</p>
          </a>
      
		<?php
			}
		?>
		</div>
    </div>
	
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">EventCenter &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery02.min.js"></script>
    <script src="js/bootstrap02.bundle.min.js"></script>

  </body>

</html>
