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
  <title>Click - Me Conta!</title>
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
  <script type="text/javascript">
    $(window).load(function(){
      $('#myModal').modal('show');
    }
    );
  </script>
  <?php
  $caminho=$_GET['caminho'];
  try{
    $conecta = $conexao->Conecta();
    $dados=$conecta->query("SELECT nClick FROM historia where upload = '".$caminho."'");
    foreach($dados as $linha){
    }
    $nClick = $linha['nClick'];
    $nClick = $nClick + 1;
    $conecta->exec("set names utf8");
    $conecta->exec("UPDATE historia  SET nClick = $nClick WHERE upload = '$caminho'");
    echo '<div  class="modal fade teste" id=myModal tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog teste">
    <div class="modal-content teste">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h1 class="text-center">OPA!</h1>
    </div>
    <div class="modal-body text-center">
    <h2>A HISTÓRIA SERÁ BAIXADA!!!</h2><br><br><br>
    <div class="form-group">
    <a href='.$caminho.' download ><button class="btn btn-primary btn-lg btn-block">OK</button></a><br> 
    <a href = "inicio.php"><button class="btn btn-primary btn-lg btn-block">Voltar para a página inicial.</button></a>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    ';
  }catch(PDOException $e){
    echo "Deu erro... ".$e->getMessage();
  }
  ?>
</body>
</html>