<?php
	require 'conexao.php';
	$pdo = conectar();
	
							
	$marca = filter_input(INPUT_POST, 'marca');
	$modelo = filter_input(INPUT_POST, 'modelo');
	$placa = filter_input(INPUT_POST, 'placa');
	$cor = filter_input(INPUT_POST, 'cor');
	$tipo = filter_input(INPUT_POST, 'tipo');

	
	if($marca && $modelo && $placa && $cor && $tipo){
		$sql = $pdo-> prepare("SELECT * FROM veiculo WHERE placa = :placa");
		$sql-> bindValue(':placa', $placa);
		$sql->execute();
		
		
		if($sql->rowCount() === 0){
			$sql = $pdo-> prepare("INSERT INTO veiculo (marca, modelo, placa, cor, tipo) VALUES (:marca, :modelo, :placa, :cor, :tipo)");
			$sql->bindValue(':marca', $marca);
			$sql->bindValue(':modelo', $modelo);
			$sql->bindValue(':placa', $placa);
			$sql->bindValue(':cor', $cor);
			$sql->bindValue(':tipo', $tipo);
			$sql->execute();
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastroVe.php");
			exit;
		}
	}
	else{
		header("Location: cadastroVe.php");
		exit;
	}
	
?>

