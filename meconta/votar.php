<?php
include 'conexao.php';
$conexao = new CONEXAO();
$id = (int) $_POST["id"];
$tipo = addslashes($_POST["tipo"]);
$cookie = isset($_COOKIE["votado_".$id]) ? $_COOKIE["votado_".$id] : null; 
try{
    $conecta = $conexao->Conecta();
    if (!isset($cookie))
    {
        $conecta->query("UPDATE historia SET ".$tipo." = ".$tipo."+1 WHERE id_historia = ".$id."");
        if ($conecta) 
        {
            setcookie("votado_".$id."", true, time()+60*60*24*6004);
            echo false;
        }
        else 
        {
            echo "Problemas no servidor.";
        }
    }
    else
    {
        echo "Você já votou!";
    }
}catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
}
?>