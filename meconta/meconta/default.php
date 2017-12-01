<?php

  session_start();
  if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
  {
  unset($_SESSION['login']);
  unset($_SESSION['senha']); 
  $logado = "";
} else{

$logado = $_SESSION['login'];
}
/*if($logado){

echo'<br><br>';

}*/

?>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="inicio.php">Me Conta!</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">


        <!--<li class="active">

          <?php
          if($logado){
          echo"<a> ".$logado."</a>";        
        }
        ?>
        
        
      </li>-->
      
      <li><a href="info.php"class="navbar-brand"> &nbsp; &nbsp; Informações  <p class='glyphicon glyphicon-question-sign '></p></a></li>
      <li>

        <?php
        
        if(!$logado){
        echo '<a href="cadastro.php" class="navbar-brand">&nbsp; Cadastre-se! &nbsp;<p class="glyphicon glyphicon-share-alt">&nbsp;</p></a>';
      }
      ?>
      
      
      
      
    </li>
    
    <li>

      <?php
      
      if(!$logado){
      echo '<a  href="login.php"class="navbar-brand">Faça login!&nbsp; <p class="glyphicon glyphicon-log-in"></p></a>';
    }
    ?>
    
    
    
    
  </li>
  
  <li>
    <?php
    
    if($logado){
    echo '<a href="public.php"class="navbar-brand">&nbsp; Publique! &nbsp;<p class="glyphicon glyphicon-pencil"></p></a>';
  }
  ?>
  
</li>
<li>

  <?php
  if($logado){
  echo '<a href="visualizaHistoria.php"class="navbar-brand">&nbsp; Ver Histórias Publicadas &nbsp;<p class="glyphicon glyphicon-book"></p></a>';
}
?>

</li>
<li>

  <?php
  if($logado){
  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>

</li>

<li class="active">

          <?php
          if($logado){
          echo"<a> ".$logado."</a>";        
        }
        ?>
        
        
      </li>

</ul>



<div class="navbar-form navbar-right">

  <?php
  if($logado){
  echo '<a href="logout.php"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-log-out"></button></a>';
}
?>

</div>

</div><!--/.navbar-collapse -->
</div>
</nav>
<br>