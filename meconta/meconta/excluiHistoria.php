<!DOCTYPE html>
<?php

require 'default.php';

?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Exclui - Me Conta!</title>

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
	<br><br><br><br>
	
	<?php

//session_start();
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
$historia = $_GET['historia'];

//echo"<br><br><br>".$historia;
    
  //echo "<br><br><br><br>";
  try{
    $conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
	//echo 'conectou coroi';
	$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dados=$conecta->query("delete from historia where upload ='".$historia."'");
	if(!unlink($historia)){
		echo"Erro ao deletar '".$historia."'";		
	}else{
		echo '<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modl" aria-hidden="true">×</button>
          <h1 class="text-center">Atenção!</h1>
      </div>
      <div class="modal-body text-center">
          
            <h2>História excluída com sucesso!</h2><br><br><br>
            <div class="form-group">
              <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
              
              
            </div>
          
      </div>
      
  </div>
  </div>
</div>';
	}
	
	
	//$dados=$conecta->query("select id_usuario from usuario where login ='".$logado."'");
		     
	
  }catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
  }
?>

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
		}
		);
  </script>

	
  </body>
</html>