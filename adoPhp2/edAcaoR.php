<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$id = filter_input(INPUT_POST, 'id');	
	$n_vaga = filter_input(INPUT_POST, 'n_vaga');
	$id_veiculo = filter_input(INPUT_POST, 'id_veiculo');
	$id_condutor = filter_input(INPUT_POST, 'id_condutor');
	$entrada = filter_input(INPUT_POST, 'entrada');
	$saida = filter_input(INPUT_POST, 'saida');

	if($id && $n_vaga && $id_veiculo && $id_condutor && $entrada && $saida){
		$sql = $pdo->prepare("UPDATE reserva SET n_vaga = :n_vaga, id_veiculo = :id_veiculo, id_condutor = :id_condutor, entrada = :entrada, saida = :saida WHERE id = :id");
		$sql->bindValue(':n_vaga', $n_vaga);
		$sql->bindValue(':id_veiculo', $id_veiculo);
		$sql->bindValue(':id_condutor', $id_condutor);
		$sql->bindValue(':entrada', $entrada);
		$sql->bindValue(':saida', $saida);
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