<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
							
	$nome = filter_input(INPUT_POST, 'nome');
	$identificacao = filter_input(INPUT_POST, 'identificacao');
	$telefone = filter_input(INPUT_POST, 'telefone');

	
	if($nome && $identificacao && $telefone){
		$sql = $pdo-> prepare("SELECT * FROM condutor WHERE nome = :nome");
		$sql-> bindValue(':nome', $nome);
		$sql->execute();
		
		
		if($sql->rowCount() === 0){
			$sql = $pdo-> prepare("INSERT INTO condutor (nome, identificacao, telefone) VALUES (:nome, :identificacao, :telefone)");
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':identificacao', $identificacao);
			$sql->bindValue(':telefone', $telefone);
			$sql->execute();
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastroC.php");
			exit;
		}
	}
	else{
		header("Location: cadastroC.php");
		exit;
	}
	
?>