<?php

include 'conexao.php';
$conexao = new CONEXAO();

$id = (int) $_POST["id"];
$tipo = addslashes($_POST["tipo"]);
$cookie = isset($_COOKIE["votado_".$id]) ? $_COOKIE["votado_".$id] : null; 
// Incluindo arquivo de conexão
try{
    $conecta = $conexao->Conecta();
			 // Recuperando valores

 
// Se o cookie ainda não foi setado
if (!isset($cookie))
{
    // Incrementa o voto da frase
    $conecta->query("UPDATE historia SET ".$tipo." = ".$tipo."+1 WHERE id_historia = ".$id."");
    // Se for um sucesso a query
    if ($conecta) 
    {
        // Seta um cookie
        setcookie("votado_".$id."", true, time()+60*60*24*6004);
        // Retorna false, ou seja, sucesso
        echo false;
    }
    // Se houver erro na query 
    else 
    {
        echo "Problemas no servidor.";
    }
}
// Se já houver um cookie
else
{
    echo "Você já votou!";
}
	
  }catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
  }
 

?>