<?php

require 'default.php';

?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
  <title>Login - Me Conta!</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <link href="csscustom/signin.css" rel=stylesheet>

  <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
  <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body class="fundo">

      
  
<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
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
    