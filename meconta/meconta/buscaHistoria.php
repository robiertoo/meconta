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
  
  <title>Busca História - Me Conta!</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ss.css" rel="stylesheet">
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  
  
  <script type="text/javascript">
    $(function($) {
      $("div.frase img").click(function() {
        var id = $(this).parent("div.frase").attr("lang");
        var tipo = $(this).attr("alt");
        var votos =  $("div[lang="+id+"] span."+tipo+" span.valor");
        var status = $("div[lang="+id+"] div.status");
        
        $.post("votar.php", {id: id, tipo: tipo}, function(resposta) {
          if (resposta) 
          {
            alert(resposta);
          } 
          
          else 
          {
            votos.html(parseInt(votos.html()) + 1);
            alert("Obrigado por votar!");
          }
        });
        
      }); 
    });
  </script> 
  <script type="text/javascript">
    $(function($) {
      $("div.nois img").click(function() {
        var id1 = $(this).parent("div.nois").attr("lang");
        var tipo1 = $(this).attr("alt");
        var votos1 =  $("div[lang="+id1+"] span."+tipo1+" span.valor");
        var status1 = $("div[lang="+id1+"] div.status1");
        
        $.post("denuncia.php", {id1: id1, tipo1: tipo1}, function(resposta) {
          if (resposta) 
          {
            alert(resposta);
          } 
          
          else 
          {
            alert("Obrigado por denunciar!");
          }
        });
        
      }); 
    });
  </script>
</head>
<body class='fundo'>
  <br><br>
  <?php
  $categ=$_GET['categ'];
  if($categ=="Outros"){
    echo'
    <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modl" aria-hidden="true">×</button>
    <h1 class="text-center">Atenção!</h1>
    </div>
    <div class="modal-body text-center">
    
    <h2>Esta área pode conter conteúdo adulto. Confirme sua idade para prosseguir:</h2><br><br><br>
    <div class="form-group">
    <a ><button class="btn btn-primary btn-lg btn-block " data-dismiss=modal>Ok, tenho mais de 18 anos.</button></a><br>
    <a href=inicio.php ><button class="btn btn-primary btn-lg btn-block">Tenho menos de 18 anos. Voltar para a página inicial.</button></a>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>
    ';
  }
  if($categ=="HQsEMangas"){
    echo'
    <div class="jumbotron '.$categ.'">
    <div class="container well">
    <br><br>
    <center><h1>HQS/ Mangás</h1></center>
    <br><br>
    
    </div>
    </div>
    ';  
  }else{
    echo'
    <div class="jumbotron '.$categ.'">
    <div class="container well">
    <br><br>
    <center><h1>'.$categ.'</h1></center>
    <br><br>
    
    </div>
    </div>
    ';
  }
  ?>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
  <script src="js/bootstrap.min.js"></script>
  <br>
  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
        <div class="text-center">
          <div class="jumbotro jumbotron1 papel">
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
                $conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
                
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conecta->exec("set names utf8");
                $y=1;
                
                $dados=$conecta->query("select titulo, bom, upload from historia order by (bom)desc");
                foreach($dados as $linha){
                  echo "<p>Curtidas: ". $linha['bom']."<br><strong>".$linha['titulo']."</strong> <br> <a class='glyphicon glyphicon-download-alt' title='Fazer download' href='click.php?caminho=".$linha['upload']."' ></a><br></p>";
                  
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
      </div>
      <div class="col-md-6">
        <div class="text-center">
          <h2 class="well">HISTÓRIAS MAIS RECENTES</h2><br>
          <p>
            <?php
            $categ=$_GET['categ'];
            try {
              $conecta=$conexao->Conecta();
              $dados=$conecta->query("SELECT * FROM historia where categoria = '".$categ."'order by `dataPublic` DESC");
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
                <a href='click.php?caminho=".$linha['upload']."' ><p class='glyphicon glyphicon-download-alt' title='Fazer download'></p></a>
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
                  echo "<p> Vezes clicadas: ".$linha['nClick']." <br> <strong>".$linha['titulo']."</strong><br><a class='glyphicon glyphicon-download-alt' title='Fazer download' href='click.php?caminho=".$linha['upload']."' ><br><br></a></p>";
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
                $conecta = $conexao->Conecta();
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
  
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  
  <script type="text/javascript">
    $(window).load(function(){
      $('#myModal').modal('show');
    }
    );
  </script>
  <script>
    $(function () {
      $('.dropdown-toggle').dropdown();
    }); 
  </script>
  
</body>
</html>