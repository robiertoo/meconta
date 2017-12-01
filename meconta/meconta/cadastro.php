<!DOCTYPE html>
<?php

require 'default.php';

?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Cadastrar Usuário - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
</head>
<body class="fundo">

<?php
  
  
  if($logado){
	 echo '<div  class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Atenção!</h1>
      </div>
      <div class="modal-body text-center">
          
            <h2>Você está logado, então quer dizer que já é cadastrado!</h2><br><br><br>
            <div class="form-group">
              <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
              
              
            </div>
          
      </div>
      
  </div>
  </div>
</div>'; 
  }


?>
 
  
  <hr>
  <div class="container">
   <div class="jumbotron papelb">
    <center><h2 class="well">Cadastrar Usuário</h2></center>
    <form id="f_cadastro" data-toggle="validator" role="form" method="post" action="recebeUsuario.php">
     <div class="form-group">
      <label for="textNome" class="control-label"><h3>Nome</h3></label>
      <input id="textNome" class="form-control" name="cxNome" placeholder="Digite seu nome..." type="text"required autofocus>
    </div>
    <div class="form-group">
      <label for="textData" class="control-label"><h3>Data de Nascimento</h3></label>
      <input id="textData" type="date" class="form-control" name="cxData" placeholder="Digite sua data de nascimento..." type="text"required autofocus>
    </div>
    <div class="form-group">
      <label for="textLogin" class="control-label"><h3>Nome de Usuário</h3></label>
      <input id="textLogin" class="form-control" name="cxLogin" placeholder="Digite seu nome de usuário (login [não utilize acentos ou caracteres especiais!])..." type="text"required autofocus pattern="[a-z]{1,15}">
      
      <label for="textSenha" class="control-label"><h3>Senha</h3></label>
      <input id="textSenha" class="form-control" name="cxSenha" placeholder="Digite sua senha (não utilize acentos ou caracteres especiais!)..." type="password"required autofocus pattern="[a-z]{1,15}">
    </div>
    <div class="form-group">
      <label for="textEmail" class="control-label"><h3>E-mail</h3></label>
      <input id="textEmail" class="form-control" name="cxEmail" placeholder="Digite seu e-mail..." type="email"required autofocus>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-primary">Limpar caixas</button>
  </form>
</div>
</div>

</body>
</html> 