<?php 

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

try{
$conecta = new PDO('mysql:host=127.0.0.1;port=3306;dbname=portal', 'root', '');
echo 'conectou coroi';
$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dados=$conecta->query("SELECT * FROM `USUARIO` WHERE `login` = '$login' AND `senha`= '$senha'");
$conecta->exec("set names utf8");

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