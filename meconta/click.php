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
  <title>Click - Me Conta!</title>
</head>
<body>
  <?php
  $caminho=$_GET['caminho'];
  try{
    $conecta = $conexao->Conecta();
    $dados=$conecta->query("SELECT nClick FROM historia where upload = '".$caminho."'");
    foreach($dados as $linha){
    }
    $nClick = $linha['nClick'];
    $nClick = $nClick + 1;
    $conecta->exec("set names utf8");
    $conecta->exec("UPDATE historia  SET nClick = $nClick WHERE upload = '$caminho'");
    
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$caminho.'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($caminho)); //Absolute URL
    ob_clean();
    flush();
    readfile($caminho); //Absolute URL
    exit();
  }catch(PDOException $e){
    echo "Deu erro... ".$e->getMessage();
  }
  ?>
</body>
</html>