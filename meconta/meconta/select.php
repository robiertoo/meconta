<?php
include 'conexao.php';
$conexao = new CONEXAO();
try{
	$conecta = $conexao->Conecta();
	
	
	$dados=$conecta->query("select id_usuario, count(*) as total from historia group by id_usuario order by count(id_usuario) desc");
	foreach($dados as $linha){
		$id=$linha['id_usuario'];
		$count=$linha['total'];
		
		$dados1=$conecta->query("select login from usuario where id_usuario = '".$id."'");
		foreach($dados1 as $linha1){
			echo "<h2>".$linha1['login']." - ".$count."<br></h2>";
		}
	}	
	
}catch(PDOException $e){
	echo "Deu erro... ".$e->getMessage();
}
?>