<?php
	require 'conexao.php';
	$pdo = conectar();
	
							
	$n_vaga = filter_input(INPUT_POST, 'n_vaga');
	$id_veiculo = filter_input(INPUT_POST, 'id_veiculo');
	$id_condutor = filter_input(INPUT_POST, 'id_condutor');
	$entrada = filter_input(INPUT_POST, 'entrada');
	$saida = filter_input(INPUT_POST, 'saida');

	
	if($n_vaga && $id_veiculo && $id_condutor && $entrada && $saida){
		$sql = $pdo-> prepare("SELECT * FROM reserva WHERE id_veiculo = :id_veiculo");
		$sql-> bindValue(':id_veiculo', $id_veiculo);
		$sql->execute();
		
		
		if($sql->rowCount() === 0){
			$sql = $pdo-> prepare("INSERT INTO reserva (n_vaga, id_veiculo, id_condutor, entrada, saida) VALUES (:n_vaga, :id_veiculo, :id_condutor,  :entrada, :saida)");
			$sql->bindValue(':n_vaga', $n_vaga);
			$sql->bindValue(':id_veiculo', $id_veiculo);
			$sql->bindValue(':id_condutor', $id_condutor);
			$sql->bindValue(':entrada', $entrada);
			$sql->bindValue(':saida', $saida);
			$sql->execute();
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastroR.php");
			exit;
		}
	}
	else{
		header("Location: cadastroR.php");
		exit;
	}
	
?>