<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$condutor = [];
	$id = filter_input(INPUT_GET, "id");
	if($id){
		$sql = $pdo->prepare("SELECT * FROM condutor WHERE id =:id");
		$sql->bindValue(':id',$id);
		$sql->execute();
		$condutor = $sql->fetch(PDO::FETCH_ASSOC);
		if(!$condutor){
			header("Location: index.php");
			
			exit;
		}
	}
	else{
			header("Location: index.php");
			
			exit;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ESTACIONAMENTO</title>
		<link rel="icon" href="icone.png" type="image/x-icon"/>
		<link rel="shortcut icon" href="icone.png" type="image/x-icon"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link href="main.css" rel="stylesheet">
	</head>
	<body>
		<div class="tudo">
		<div class="cabecalho">
			<a href="https://www.fontspace.com/category/cursive"><img src="https://see.fontimg.com/api/renderfont4/9Y2DK/eyJyIjoiZnMiLCJoIjo4MSwidyI6MTI1MCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/RXN0YWNpb25hbWVudG8/nature-beauty-personal-use.png" alt="Cursive fonts"></a>
			<br>	
		</div>		
			<form method="POST" action="edAcaoC.php" class="row">
				<h2>Editar Condutor</h2>
				<input type="hidden" value="<?=$condutor['id'];?>" name="id"/>
						
				<div class="col-3">
					<label for="nome" class="form-label">Nome:</label>
					<input type="text" class="form-control" id="nome" value="<?=$condutor['nome'];?>" name="nome">
				</div>
				<div class="col-3">
					<label for="identificacao" class="form-label">CPF:</label>
					<input type="text" class="form-control" id="identificacao" value="<?=$condutor['identificacao'];?>"  name="identificacao">
				</div>
				<div class="col-3">
					<label for="telefone" class="form-label">Telefone p/contato:</label>
					<input type="text" class="form-control" id="telefone" value="<?=$condutor['telefone'];?>"  name="telefone">
				</div>
				<input class="btn btn-dark cad" type="submit" value="SALVAR"/>
			</form>
		<br><br>
			<a href="index.php"><img src="voltar.png" class="voltar"></a>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>