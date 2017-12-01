<?php 
include 'conexao.php';
$conexao = new CONEXAO();

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

try{
$conecta = $conexao->Conecta();
$dados=$conecta->query("SELECT * FROM `USUARIO` WHERE `login` = '$login' AND `senha`= '$senha'");
//$conecta->exec("set names utf8");

$obj = $dados->fetchObject();

if($obj){

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:inicio.php');
}
else{
echo 'nao entrei grazadeus';
unset ($_SESSION['login']);
unset ($_SESSION['senha']);
header('location:login.php');

}

}catch(PDOException $e){
echo "Deu erro... ".$e->getMessage();
}

?>