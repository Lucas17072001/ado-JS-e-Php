<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
	$id = filter_input(INPUT_POST, 'id');	
	$marca = filter_input(INPUT_POST, 'marca');
	$modelo = filter_input(INPUT_POST, 'modelo');
	$placa = filter_input(INPUT_POST, 'placa');
	$cor = filter_input(INPUT_POST, 'cor');
	$tipo = filter_input(INPUT_POST, 'tipo');

	if($id && $marca && $modelo && $placa && $cor && $tipo){
		$sql = $pdo->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, placa = :placa, cor = :cor, tipo = :tipo WHERE id = :id");
		$sql->bindValue(':marca', $marca);
		$sql->bindValue(':modelo', $modelo);
		$sql->bindValue(':placa', $placa);
		$sql->bindValue(':cor', $cor);
		$sql->bindValue(':tipo', $tipo);
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
