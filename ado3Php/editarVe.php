<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
	$veiculos = [];
	$id = filter_input(INPUT_GET, "id");
	if($id){
		$sql = $pdo->prepare("SELECT * FROM veiculo WHERE id =:id");
		$sql->bindValue(':id',$id);
		$sql->execute();
		$veiculos = $sql->fetch(PDO::FETCH_ASSOC);
		if(!$veiculos){
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
			<form method="POST" action="edAcaoVe.php" class="row">
				<h2>Editar Veiculo</h2>
				<input type="hidden" value="<?=$veiculos['id'];?>" name="id"/>
						
				<div class="col-3">
					<label for="marca" class="form-label">Marca:</label>
					<input type="text" class="form-control" id="marca" value="<?=$veiculos['marca'];?>" name="marca">
				</div>
				<div class="col-3">
					<label for="modelo" class="form-label">Modelo:</label>
					<input type="text" class="form-control" id="modelo" value="<?=$veiculos['modelo'];?>"  name="modelo">
				</div>
				<div class="col-3">
					<label for="placa" class="form-label">Placa:</label>
					<input type="text" class="form-control" id="placa" value="<?=$veiculos['placa'];?>"  name="placa">
				</div>
				<div class="col-4">
					<label for="cor" class="form-label">Cor: </label>
					<input type="text" class="form-control" id="cor"  value="<?=$veiculos['cor'];?>" name="cor">
				</div>
				<div class="col-4">
					<label for="tipo" class="form-label">Tipo:</label>
					<input type="tipo" class="form-control" id="tipo" value="<?=$veiculos['tipo'];?>" name="tipo">
				</div>
				<input class="btn btn-dark cad" type="submit" value="SALVAR"/>
			</form>
		<br><br>
			<a href="index.php"><img src="voltar.png" class="voltar"></a>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>