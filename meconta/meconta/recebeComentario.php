<!DOCTYPE html>
<?php
  require 'default.php';
  
  //echo'<br><br><br>asdasd';
  
  $comentario = $_POST['cxComentario'];
  $idHistoria = $_POST['textIdHist'];
  
  try{
  $conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
	//echo 'conectou coroi';
	$conecta->exec("set names utf8");
  $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dados=$conecta->query("SELECT id_usuario FROM usuario where login = '".$logado."'");
		     foreach($dados as $linha){
		       //echo "<h2>".$linha['id_usuario']."<br></h2>";
		     }
			 
	$idUsuario = $linha['id_usuario'];
	
	//echo"<br>". $comentario;
	//echo"<br>". $idHistoria;
	//echo"<br>". $idUsuario;
	
	
	 
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
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Recebe História - Me Conta!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="ss.css" rel="stylesheet">
	
	<script src="js/jquery-3.1.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/bootstrap.js"></script>
	
	<script src="js/jquery.min.js"></script>
<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="fundo">
  <br><br><br>
  
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
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