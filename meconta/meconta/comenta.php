<!DOCTYPE html>
<?php
  require 'default.php';
  $idHist=$_GET['id'];
  //echo"<br><br><br><br>".$idHist;
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Comentar História - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
</head>
<body class="fundo">




<br>

  

  
  
  <hr>
  <div class="container">
   <div class="jumbotron papelb">
    <center><h2 class="well">Comentar</h2></center>
    <form id="f_cadastro" data-toggle="validator" role="form" method="post" action="recebeComentario.php">
     <div class="form-group">
      <label for="textComentario" class="control-label"><h3>Comentário</h3></label><br>
      <textarea name="cxComentario" id="cxComentario" form="f_cadastro" rows="4" cols="100" required autofocus></textarea>
	  <?php
	   echo '<input name="textIdHist" type="hidden" id="textIdHist" value='.$idHist.' />';
	  ?>
    </div>
	
       
    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-primary">Limpar caixas</button>
  </form>
</div>
</div>

</body>
</html> 