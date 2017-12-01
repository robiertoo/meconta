<?php
require 'default.php';
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width , initial-scale=1">
  
  <title>Login - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <link href="csscustom/signin.css" rel=stylesheet>
  </head>
  <body class="fundo">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <br><br><br><br><br>
    <div class="jumbotron fundo">
      <form class="form-signin" method="post" action="ope.php" id="formlogin" name="formlogin">
        <h2 class="form-signin-heading well">Faça aqui seu login: </h2>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="login" name="login" class="form-control" placeholder="Digite aqui seu login..." required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite aqui sua senha..." required>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Logar">
      </form>
    </div> <!-- /container -->
  </body>
  </html>