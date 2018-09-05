<?php
session_start();
if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='sair.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EventCenter</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet" type="text/css">
	
	<style>
		body {
			background-image: url(07.jpg);
			background-attachment: fixed;
			background-repeat:no-repeat;
			background-size:100%;
		}
	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Tipo de evento
                    </a>
                </li>
                <li>
                    <a href="servicocasamento.php">Casamento</a>
                </li>
                <li>
                    <a href="servicoformatura.php">Formatura</a>
                </li>
                <li>
                    <a href="#">Aniversário</a>
                </li>
                <li>
                    <a href="comprar.php">Serviços</a>
                </li>
                <li>
                    <a href="#">Contato</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Salas de Eventos</h1>
                <p>Para quem deseja realizar eventos de sucesso, este é o lugar! EventCenter possui belíssimos salões para a realização de eventos com estrutura completa de áudio e vídeo, internet, coffee break, coquetel, almoço e jantar.</p>
                <p>Clique no menu e escolha seu tipo de evento</p>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
