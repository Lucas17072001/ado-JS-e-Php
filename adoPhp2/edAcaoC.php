<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$id = filter_input(INPUT_POST, 'id');	
	$nome = filter_input(INPUT_POST, 'nome');
	$identificacao = filter_input(INPUT_POST, 'identificacao');
	$telefone = filter_input(INPUT_POST, 'telefone');

	if($id && $nome && $identificacao && $telefone){
		$sql = $pdo->prepare("UPDATE condutor SET nome = :nome, identificacao = :identificacao, telefone = :telefone WHERE id = :id");
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':identificacao', $identificacao);
		$sql->bindValue(':telefone', $telefone);
		$sql->bindValue(':id', $id);
		$sql->execute();
		header("Location: index.php");
		exit;
	}
	else{
		header("Location: index.php"); 
		exit;
	}
?>
