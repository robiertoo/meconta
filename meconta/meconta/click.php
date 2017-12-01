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
    <title>Click - Me Conta!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
  <body>
	
	
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
			
	
	<?php
$caminho=$_GET['caminho'];

//echo $caminho;

try{
$conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
//echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>conectou coroi';
$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$dados=$conecta->query("SELECT nClick FROM `historia` WHERE `upload` = '$caminho'");
$dados=$conecta->query("SELECT nClick FROM historia where upload = '".$caminho."'");

//echo "<br><br><br><br><br><br><br><br>";
		     foreach($dados as $linha){
		       //echo "<h2> catiou ".$linha['nClick']."<br></h2>";
		     }
			 
			 $nClick = $linha['nClick'];
			 //echo $linha;
//if(!$linha['nClick']){
	
//	$nClick = 0;
	
//} else {
	
//}
//echo 'Numero de clicks antes: '.$nClick.'<br>';
$nClick = $nClick + 1;

$conecta->exec("set names utf8");
//$conecta->exec("INSERT INTO historia(nClick) VALUES('".$nClick."') where upload = '$caminho'");
$conecta->exec("UPDATE historia  SET nClick = $nClick WHERE upload = '$caminho'");
//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
	
//echo 'Numero de clicks atual: '.$nClick.'<br>';

//header($caminho);
//header("Location: $caminho");
//header("Content-Disposition: attachment; filename='".basename($caminho)."'");
//header("Content-Disposition: attachment; filename=\"" . basename($caminho) . "\"");

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


//echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=$caminho'>";
//header("location: inicio.php");

//echo "<meta HTTP-EQUIV='Refresh' CONTENT='5;URL=inicio.php'>";






}catch(PDOException $e){
echo "Deu erro... ".$e->getMessage();
}


?>
	
	
  </body>
</html>