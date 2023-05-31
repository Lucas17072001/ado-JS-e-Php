<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$numero = filter_input(INPUT_POST, 'numero');	
	$tipo = filter_input(INPUT_POST, 'tipo');

	if($numero && $tipo){
		$sql = $pdo->prepare("UPDATE vaga SET tipo = :tipo WHERE numero = :numero");
		$sql->bindValue(':tipo', $tipo);
		$sql->bindValue(':numero', $numero);
		$sql->execute();
		header("Location: index.php");
		exit;
	}
	else{
		header("Location: index.php"); 
		exit;
	}
?>
