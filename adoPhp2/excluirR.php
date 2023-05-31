<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$id = filter_input(INPUT_GET, 'id');
	
	if($id){
		$sql = $pdo->prepare("DELETE FROM reserva WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
	header("Location: index.php");
	
?>