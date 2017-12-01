<?php
require 'default.php';
include 'conexao.php';
$conexao = new CONEXAO();
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <title>Recebe Usuário - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <?php
  $nome = $_POST['cxNome'];
  $data = $_POST['cxData'];
  $login = $_POST['cxLogin'];
  $senha = $_POST['cxSenha'];
  $email = $_POST['cxEmail'];
  $diretorio = 'ups/'.$login.'/';
  mkdir($diretorio);
  try{
    $conecta = $conexao->Conecta();	
    $dados=$conecta->query("SELECT * FROM usuario");
    foreach($dados as $linha){
    }
    if($login == $linha['login']){
      echo '<div  class="modal fade" id = "myModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" id="myModal" data-dismiss="moal" aria-hidden="true">?</button>
      <h1 class="text-center">Atenção!</h1>
      </div>
      <div class="modal-body text-center">
      <h2>Login já consta em nosso Banco de Dados!</h2><br><br><br>
      <div class="form-group">
      <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
      </div>
      </div>
      </div>
      </div>
      </div>';
    } else {
     $conecta->exec("set names utf8");
     $conecta->exec("INSERT INTO usuario(nome, login, senha, dataNasc, email, diretorio) VALUES('".$nome."', '".$login."', '".$senha."', '".$data."', '".$email."', '".$diretorio."')");
     echo '<div  class="modal fade" id="myModal "tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
     <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" id="myModal"data-dismiss="moal" aria-hidden="true">?</button>
     <h1 class="text-center"></h1>
     </div>
     <div class="modal-body text-center">
     <h2>CADASTRO CONCLUÍDO!!!</h2><br><br><br>
     <div class="form-group">
     <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a p?gina inicial.</button></a>
     </div>
     </div>
     </div>
     </div>
     </div>';
     session_start();
     $conecta = $conexao->Conecta();
     $dados=$conecta->query("SELECT * FROM `USUARIO` WHERE `login` = '$login' AND `senha`= '$senha'");
     $obj = $dados->fetchObject();
     if($obj){
      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      header('location:inicio.php');
    }
    else{
      echo 'nao entrei grazadeus';
      unset ($_SESSION['login']);
      unset ($_SESSION['senha']);
      header('location:login.php');
    }
    
  }
}catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
}
?>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  }
  );
</script>
</body>
</html>