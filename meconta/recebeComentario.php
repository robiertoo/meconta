<?php
require 'default.php';
include 'conexao.php';
$conexao = new CONEXAO();
$comentario = $_POST['cxComentario'];
$idHistoria = $_POST['textIdHist'];
try{
  $conecta = $conexao->Conecta();
  $dados=$conecta->query("SELECT id_usuario FROM usuario where login = '".$logado."'");
  foreach($dados as $linha){
  }
  $idUsuario = $linha['id_usuario'];
  $dados=$conecta->query("INSERT INTO comentario(id_usuario, id_historia, texto) VALUES('".$idUsuario."', '".$idHistoria."', '".$comentario."')");
  echo '<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h1 class="text-center">TOPPER</h1>
  </div>
  <div class="modal-body text-center">
  <h2>COMENTÁRIO PUBLICADO!!</h2><br><br><br>
  <div class="form-group">
  <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
  </div>
  </div>
  </div>
  </div>
  </div>';   			 
}catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
}
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width , initial-scale=1">
  <title>Recebe História - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body class="fundo">
  <br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(window).load(function(){
      $('#myModal').modal('show');
    }
    );
  </script>		
</body>
</html>