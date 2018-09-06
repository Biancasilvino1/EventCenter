<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/signin.css">
    </head>
    <body class="form-signin">
        <form method="POST" action="restritovalida.php">
            <h2>Área Restrita</h2>
            <!--<label>Email</label>-->
            <input type="text" name="usuario" placeholder="Digite o seu usuário" class="form-control" required autofocus><br>
            <!--<label>Senha</label>-->
            <input type="password" name="senha" placeholder="Digite a sua senha" class="form-control" required autofocus><br>
            <input type="submit" name="btnLogin" value="Acessar" class="btn btn-lg btn-primary btn-block"><br>
        </form>
        <p>
            <?php if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }?>
        </p>
        <p>
            <?php 
            if(isset($_SESSION['logindeslogado'])){
                echo $_SESSION['logindeslogado'];
                unset($_SESSION['logindeslogado']);
            }
            ?>
        </p>
    </body>
</html>