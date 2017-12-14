<?php
include 'conexao.php';
$conexao = new CONEXAO();
$id = (int) $_POST["id1"];
$tipo = addslashes($_POST["tipo1"]);
$cookie = isset($_COOKIE["votado_1".$id]) ? $_COOKIE["votado_1".$id] : null; 
try{
  $conecta = $conexao->Conecta();
  if (!isset($cookie))
  {
   $conecta->query("INSERT INTO denuncia(id_historia) VALUES(".$id.")");
   if ($conecta) 
   {
    setcookie("votado_1".$id."", true, time()+60*60*24*6004);
    echo false;
  }
  else 
  {
    echo "Problemas no servidor.";
  }
}
else
{
  echo "Você já denunciou!";
}
}catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
}
?>