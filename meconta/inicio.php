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
  <title>Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  <script src="js/jquery.min.js"></script>
  
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  
  <script type="text/javascript" src="js/acoes.js"></script> 
  <script type="text/javascript" src="js/click.js"></script>
</head>
<body class="fundo">
  <br><br>
  <div class="jumbotron livros fundo">
    <div class="container well">
      <h1>Bem vindos!</h1>
      <p>Neste mero portal espero lhes dar a oportunidade de publicar tuas histórias, contos, enfim, aquilo que estiveres disposto a compartilhar!</p>
      <p>Bora publicar histórias ou descobrir algumas?</p>
      <p><a class="btn btn-primary btn-lg" href="info.php" role="button">Saiba mais &raquo;</a></p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="text-center">
          <div class="jumbotro jumbotron1 papel border">
            <h2 class="well">Categorias</h2>
            <br>
            <a href ="buscaHistoria.php?categ=Infantil"><div class="Infantil oi"><p class="qq meio">Infantil</p></div></a>
            <a href ="buscaHistoria.php?categ=Fantasia"><div class="Fantasia oi"><p class="meio qq">Fantasia</p></div></a>
            <a href ="buscaHistoria.php?categ=HQsEMangas"><div class="HQsEMangas oi"><p class="meio qq">HQs/Mangás</p></div></a>
            <a href ="buscaHistoria.php?categ=Contos"><div class="Contos oi"><p class="meio qq">Contos</p></div></a>
            <a href ="buscaHistoria.php?categ=Poesia"><div class="Poesia oi"><p class="meio qq">Poesia</p></div></a>
            <a href ="buscaHistoria.php?categ=Educativo"><div class="Educativo oi"><p class="meio qq">Educativo</p></div></a>
            <a href ="buscaHistoria.php?categ=Musical"><div class="Musical oi"><p class="meio qq">Musical</p></div></a>
            <a href ="buscaHistoria.php?categ=Pensamentos"><div class="Pensamentos oi"><p class="meio qq">Pensamentos</p></div></a>
            <a href ="buscaHistoria.php?categ=Suspense"><div class="Suspense oi"><p class="meio qq">Suspense</p></div></a>
            <a href ="buscaHistoria.php?categ=Outros"><div class="Outros oi"><p class="meio qq">Outros</p></div></a>
          </div>
        </div>
        <br>
        <center>
         <div class="jumbotron1 papelh border">
          <h2 class="well">Histórias mais curtidas</h2>
          <br>
          <p>
            <?php
            try{
             $conecta=$conexao->Conecta();
             $y=1;
             $dados=$conecta->query("select titulo, bom, upload from historia order by (bom)desc");
             foreach($dados as $linha){
              echo "<p>Curtidas: ". $linha['bom']."<br> <strong>".$linha['titulo']."</strong> <br><a  id='download1' class='glyphicon glyphicon-download-alt' title='Fazer download' href='click.php?caminho=".$linha['upload']."'></a><br></p>";
              
              if($y>=3){
                break;
              }
              $y++;
            }  
          }catch(PDOException $e){
            echo "Deu erro... ".$e->getMessage();
          }
          ?>
        </p>
      </div>
    </center>
    <br>
  </div>
  <div class="col-md-6">
    <div class="text-center">
      <h2 class="well">HISTÓRIAS MAIS RECENTES</h2><br>
      <p>
        <?php
        
        try {
          $conecta=$conexao->Conecta();
          
          $dados=$conecta->query("SELECT * FROM historia order by `dataPublic` DESC");
          
          $x = 1; 
          
          foreach($dados as $linha)
          {
            $anonimo = $linha['anonimo'];
            if ($anonimo == 1){
              $anonimo = "Anônimo";
              
            } else {
              $anonimo = $linha['id_usuario'];
              $dados1=$conecta->query("SELECT nome FROM usuario where id_usuario = '".$anonimo."'");
              foreach($dados1 as $linha1){
              }
              $anonimo = $linha1['nome'];
              
            }
            
            $texto="";
            $dados2=$conecta->query("SELECT * FROM comentario where id_historia = '".$linha['id_historia']."'");
            
            foreach($dados2 as $linha2){
             $dados3=$conecta->query("SELECT nome FROM usuario where id_usuario = '".$linha2['id_usuario']."'");
             foreach($dados3 as $linha3){}
               $texto=$texto . $linha3['nome'] . "<br>". $linha2['texto'] . "<br><br>";
             
           }
           
           echo "<div class='jumbotron branco papelb' >
           <p><h2>".$linha['titulo']." </h2><br>
           ".$anonimo."<br>
           </p> 
           <div class='dropdown'>
           <button class='btn btn-primary dropdown-toggle marrom' type='button' data-toggle='dropdown'>Comentários
           <span class='caret'></span></button>
           <ul class='dropdown-menu  goo'>
           <li ><center><p>".$texto."</p></center></li>
           </ul>
           </div>
           <br>
           <div class='esquerda'>
           ";
           if($logado){
            echo "<a href='comenta.php?id=".$linha['id_historia']."'><p class=' nois glyphicon glyphicon-comment' title='Comentar'></p></a>";
          }  
          echo"  
          </div>
          <div class='direita'>
          <a id='download2' href='click.php?caminho=".$linha['upload']."'><p class='glyphicon glyphicon-download-alt' title='Fazer download'></p></a>
          <br><br>
          <div class='nois' lang=".$linha['id_historia'].">
          <img src='imagens/no.png' alt='no' title='Denunciar'/>
          <div class='status1'></div>
          </div>
          </div><br>
          <div class='esquerda frase' lang=".$linha['id_historia'].">
          <br>
          &nbsp;<img src='imagens/bom.png' alt='bom'/>
          <span class='bom'>
          (&nbsp;<span class='valor'>".$linha['bom']."</span>&nbsp;)
          </span>
          
          <br>
          
          <img src='imagens/ruim.png' alt='ruim'/>
          <span class='ruim'>
          (&nbsp;<span class='valor'>".$linha['ruim']."</span>&nbsp;)
          </span>
          <div class='status'></div>
          </div>
          <br><br><br>
          </div>";
          if($x==5){
            break;      
          }
          $x++;
        }
      }
      catch (PDOException $erro)
      {
        echo "<h1>Não consegui fazer a consulta</h1>";
      }
      ?>
    </p>
  </div>
</div>
<div class="col-md-3">
  <div class="text-center">
    <div class="jumbotron1 papelh border">
      <h2 class="well">Histórias mais clicadas</h2>
      <br>
      <p>
        <?php
        try {
          $conecta=$conexao->Conecta();
          $dados=$conecta->query("SELECT * FROM historia order by `nClick` DESC");
          
          $x = 1; 
          foreach($dados as $linha)
          {
            echo "<p> Vezes clicadas: ".$linha['nClick']." <br> <strong>".$linha['titulo']."</strong><br><a id='download3' href='click.php?caminho=".$linha['upload']."' class='glyphicon glyphicon-download-alt' title='Fazer download' ><br><br></a></p>";
            if($x==3){
              break;      
            }
            $x++;
            
          }
          
        }
        catch (PDOException $erro)
        {
          echo "<h1>Não consegui fazer a consulta</h1>";
        }
        ?>
      </p>
    </div>
    <br>
    <div class="jumbotron1 papelh border">
      <h2 class="well">Top Autores</h2>
      <br>
      <p>
        <?php
        
        try{
          $conecta=$conexao->Conecta();
          $y=1;
          
          $dados=$conecta->query("select id_usuario, count(*) as total from historia group by id_usuario order by count(id_usuario) desc");
          foreach($dados as $linha){
            $id=$linha['id_usuario'];
            $count=$linha['total'];
            $dados1=$conecta->query("select login from usuario where id_usuario = '".$id."'");
            foreach($dados1 as $linha1){
              echo "<p><strong>".$linha1['login']."</strong> <br> Total de Histórias: ".$count."<br></p>";
            }
            if($y>=3){
              break;
            }
            $y++;
          }  
        }catch(PDOException $e){
          echo "Deu erro... ".$e->getMessage();
        }
        ?>
      </p>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>
