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
	
	<?php

  //session_start();
  $logado = $_SESSION['login'];
  
  $categoria = $_POST['cxCategoria'];
  $titulo = $_POST['cxTitulo'];
  //$upload = $_POST['cxUpload'];
  $anonimo = $_POST['cxAnonimo'];
  
  
  //echo '<br>'.$categoria;
  //echo '<br>'.$titulo;
  //echo '<br>'.$nome_real;
  //echo '<br>'.$logado;
  //echo '<br>'.$anonimo. '<br>';
  
  $nome_temporario=$_FILES["cxUpload"]["tmp_name"];
$nome_real=$_FILES["cxUpload"]["name"];
//replace aqui porque pode ter problema de espaçamento entre palavras nos documentos upados.
$nome_real = str_replace(' ', '', $nome_real);
$nome_real = str_replace('ç', 'c', $nome_real);
$nome_real = str_replace('Ç', 'C', $nome_real);
$nome_real = str_replace('ã', 'a', $nome_real);
$nome_real = str_replace('Ã', 'A', $nome_real);
$nome_real = str_replace('ó ', 'o', $nome_real);
$nome_real = str_replace('Ó', 'O', $nome_real);
$nome_real = str_replace('õ ', 'o', $nome_real);
$nome_real = str_replace('Õ', 'O', $nome_real);
$nome_real = str_replace('é', 'e', $nome_real);
$nome_real = str_replace('É', 'E', $nome_real);

copy($nome_temporario,"ups/$logado/$nome_real"); 

//echo $nome_real;
//echo $nome_temporario;

$nome_real = str_replace(' ', '', $nome_real);

//echo '<a href="ups/'.$logado.'/'.$nome_real.'" download>Clique aqui para fazer o download</a>';

$caminho='ups/'.$logado.'/'.$nome_real.'';

//$caminho   = str_replace(' ', '', $caminho);
  
  $date = date('Y-m-d H:i:s');
  
  
  try{
    $conecta = $conexao->Conecta();
	//$dados=$conecta->query("SELECT * FROM clientes");
	$dados=$conecta->query("SELECT id_usuario FROM usuario where login = '".$logado."'");
		     foreach($dados as $linha){
		       //echo "<h2>".$linha['id_usuario']."<br></h2>";
		     }
			
			
	
	$idUsuario=$linha['id_usuario'];
	//echo $idUsuario."<br>";
	
	$dados=$conecta->query("SELECT * FROM historia");
		     foreach($dados as $linha){
		       //echo "<h2>".$linha['id_usuario']."<br></h2>";
		     }
	
	if($caminho == $linha['upload']){
		echo '<h2>Macacos me mordam!</h2>';
		
		echo '<div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Atenção!</h1>
      </div>
      <div class="modal-body text-center">
          
            <h2>Arquivo já consta em nosso Banco de Dados!</h2><br><br><br>
            <div class="form-group">
              <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
              
              
            </div>
          
      </div>
      
  </div>
  </div>
</div>';

	} else {
	
	$conecta->exec("set names utf8");
	$conecta->exec("INSERT INTO historia(id_usuario, titulo, categoria, upload, dataPublic, nClick, anonimo) VALUES('".$idUsuario."', '".$titulo."', '".$categoria."', '".$caminho."', '".$date."', 0, '".$anonimo."')");
	echo '<div  class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">'.$titulo.'</h1>
      </div>
      <div class="modal-body text-center">
          
            <h2>PUBLICAÇÃO CADASTRADA COM SUCESSO!!!</h2><br><br><br>
            <div class="form-group">
              <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Ok, voltar para a página inicial.</button></a>
              
              
            </div>
          
      </div>
      
  </div>
  </div>
</div>';
	
	
	}
	
	/*echo 'Dados jรก cadastrados: ';
	foreach($dados as $linha){
	  echo $linha['nome']. "<br>" . $linha['endereco'] . "<br>" . $linha['cidade'] . "<br>" . $linha['datanasc'];		
	}*/
	
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