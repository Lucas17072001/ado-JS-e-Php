<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
							
	$tipo = filter_input(INPUT_POST, 'tipo');

	
	if($tipo){
		$sql = $pdo-> prepare("SELECT * FROM vaga WHERE tipo = :tipo");
		$sql-> bindValue(':tipo', $tipo);
		$sql->execute();
		
		
		if($sql->rowCount() === 0){
			$sql = $pdo-> prepare("INSERT INTO vaga (tipo) VALUES (:tipo)");
			$sql->bindValue(':tipo', $tipo);
			$sql->execute();
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastroVa.php");
			exit;
		}
	}
	else{
		header("Location: cadastroVa.php");
		exit;
	}
	
?>