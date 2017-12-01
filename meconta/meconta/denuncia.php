<?php

$id = (int) $_POST["id1"];
$tipo = addslashes($_POST["tipo1"]);
$cookie = isset($_COOKIE["votado_1".$id]) ? $_COOKIE["votado_1".$id] : null; 
// Incluindo arquivo de conexão
try{
    $conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
	//echo 'conectou coroi';
	$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	
			 
			 // Recuperando valores

 
// Se o cookie ainda não foi setado
if (!isset($cookie))
{
    // Incrementa o voto da frase
	$conecta->query("INSERT INTO denuncia(id_historia) VALUES(".$id.")");
    // Se for um sucesso a query
    if ($conecta) 
    {
        // Seta um cookie
        setcookie("votado_1".$id."", true, time()+60*60*24*6004);
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
    echo "Você já denunciou!";
}
	
  }catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
  }
 

?>