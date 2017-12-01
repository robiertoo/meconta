<?php
class CONEXAO{
	var $usuario = 'root';
	var $senha = '';
	var $host = "127.0.0.1";
	var $banco = "portal";
	
	
	function Conecta(){
		$conecta = new PDO('mysql:host='.$this->host.';port=3306;dbname='.$this->banco.'', $this->usuario, $this->senha);
		$conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conecta->exec("set names utf8");
		return $conecta;
	}
	
}
?>