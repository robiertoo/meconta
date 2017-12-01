<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}
	$logado = $_SESSION['login'];
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	olar
	<a href = logout.php>Sair</a> 
</body>
</html>
