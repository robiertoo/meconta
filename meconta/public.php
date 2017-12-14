<?php
require 'default.php';
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Publicar História - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  
</head>
<body>
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
  <h2>É necessário ter um cadastro ou estar logado para poder publicar aqui!</h2><br><br><br>
  <div class="form-group">
  <a href=login.php ><button class="btn btn-primary btn-lg btn-block">Ok, fazer login.</button></a><br>
  <a href=cadastro.php ><button class="btn btn-primary btn-lg btn-block">Ok, me cadastrar.</button></a>
  </div>
  </div>
  </div>
  </div>
  </div>'; 
  $logado = "";
}else{
  $logado = $_SESSION['login'];
}
?>
<br><br>
<div class="container">
 <div class="jumbotron papelb">
  <center><h2 class="well">Publicar História</h2></center>
  <form id="f_cadastro" data-toggle="validator" role="form" method="post" action="recebeHistoria.php" enctype="multipart/form-data">
   <div class="form-group">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Selecione aqui a categoria
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <div class="input-group">
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Infantil" required> Infantil</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Fantasia" required> Fantasia</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="HQsEMangas" required> HQS/ Mangás</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Contos" required> Contos</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Poesia" required> Poesia </li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Educativo" required> Educativo </li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Musical" required> Musical</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Pensamentos" required> Pensamentos </li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Suspense" required> Suspense</li>
            <li><input id="textCategoria" name="cxCategoria" type="RADIO" VALUE="Outros" required> Outros </li>
          </div>
        </ul>
      </div> 
    </div>
    <div class="form-group">
      <label for="textTitulo" class="control-label"><h3>Título</h3></label>
      <input id="textTitulo" class="form-control" name="cxTitulo" placeholder="Digite o título de sua história..." type="text"required autofocus>
    </div>
    <div class="form-group">
      <label for="textUpload" class="control-label"><h3>Carregue aqui sua história: </h3></label>
      <input id="textUpload" class="form-control" name="cxUpload" type="file"required autofocus>
    </div>
    <div class="form-group">
      <label for="textAnonimo" class="control-label"><h3>Publicar como um anônimo?</h3></label>
      <input id="textAnonimo" name="cxAnonimo" type="RADIO" VALUE= 1 required> SIM 
      <input id="textAnonimo" name="cxAnonimo" type="RADIO" VALUE= 0 required> NÃO
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-primary">Limpar caixas</button>
  </form>
</div>
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