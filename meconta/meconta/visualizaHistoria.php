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
  <title>Visualiza - Me Conta!</title>
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
</head>
<body class="fundo">
  <div class="container">
    <br><br><br>
    <h2 class="well"><center>Histórias Publicadas<center></h2>
     <?php
     if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
     {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      echo '<div  class="modal fade" id=myModal tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modall" aria-hidden="true">×</button>
      <h1 class="text-center">Atenção!</h1>
      </div>
      <div class="modal-body text-center">
      <h2>Você não está logado!</h2><br><br><br>
      <div class="form-group">
      <a href=login.php ><button class="btn btn-primary btn-lg btn-block">Ok, fazer login.</button></a><br>
      <a href=cadastro.php ><button class="btn btn-primary btn-lg btn-block">Ok, me cadastrar.</button></a>
      </div>
      </div>
      </div>
      </div>
      </div>'; 
    }
    $logado = $_SESSION['login'];
    echo "<br><br><br><br>";
    try{
      $conecta = $conexao->Conecta();
      $dados=$conecta->query("select id_usuario from usuario where login ='".$logado."'");
      foreach($dados as $linha){
        $id=$linha['id_usuario'];
        
        $dados1=$conecta->query("select upload, titulo from historia where id_usuario = '".$id."'");
        foreach($dados1 as $linha1){
         $hist=$linha1['upload'];
         echo "
         <div class='jumbotron papelb'>
         <h2>Título: ".$linha1['titulo']."  <br><br> <a href = excluiHistoria.php?historia=".$hist.">Excluir</a><br></h2>
         </div>
         ";
       }
     }	
   }catch(PDOException $e){
     echo "Deu erro... ".$e->getMessage();
   }
   ?>
 </div>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  }
  );
</script>
</body>
</html>