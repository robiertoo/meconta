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
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conte?do deve vir *ap?s* essas tags -->
    <title>Recebe Usuário - Me Conta!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/bootstrap.js"></script>
	
	<script src="js/jquery.min.js"></script>
<!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js n?o funciona se voc? visualizar uma p?gina file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	


    <!-- jQuery (obrigat?rio para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necess?rio -->
    <script src="js/bootstrap.min.js"></script>
	
	<?php
  $nome = $_POST['cxNome'];
  $data = $_POST['cxData'];
  $login = $_POST['cxLogin'];
  $senha = $_POST['cxSenha'];
  $email = $_POST['cxEmail'];
  $diretorio = 'ups/'.$login.'/';
  
  
  mkdir($diretorio);
  
  
  //echo '<br>'.$nome;
  //echo '<br>'.$data;
  //echo '<br>'.$login;
  //echo '<br>'.$senha;
  //echo '<br>'.$email;
  //echo '<br>'.$diretorio;
  
  try{
    $conecta = $conexao->Conecta();	
	
	
	$dados=$conecta->query("SELECT * FROM usuario");
		     foreach($dados as $linha){
		       //echo "<h2>".$linha['id_usuario']."<br></h2>";
		     }
	
	if($login == $linha['login']){
		//echo 'macacos me mordam';
		
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


	/*echo 'Dados jรก cadastrados: ';
	foreach($dados as $linha){
	  echo $linha['nome']. "<br>" . $linha['endereco'] . "<br>" . $linha['cidade'] . "<br>" . $linha['datanasc'];		
	}*/
	
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