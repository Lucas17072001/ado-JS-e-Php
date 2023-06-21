<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$numero = filter_input(INPUT_GET, 'id');
	
	if($numero){
		$sql = $pdo->prepare("DELETE FROM vaga WHERE numero = :numero");
		$sql->bindValue(":numero", $numero);
		$sql->execute();
	}
	header("Location: index.php");
	
?>