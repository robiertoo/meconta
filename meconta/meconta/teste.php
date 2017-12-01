<?php
require 'default.php';
include 'conexao.php';
$conexao = new CONEXAO();
?>
<html>
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
  <script src="js/bootstrap.min.js"></script>
  
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
<body>
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
          <a href='click.php?caminho=".$linha['upload']."'><p class='glyphicon glyphicon-download-alt' title='Fazer download'></p></a>
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
</body>
</html>
