<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
	$reserva=[];
	$sql = "SELECT * FROM reserva";
	$resultado = $pdo->query($sql);
	while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$reserva[] = $linha;
	}
	
	$vaga=[];
	$sql1 = "SELECT * FROM vaga";
	$resultado = $pdo->query($sql1);
	while ($vg = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$vaga[] = $vg;
	}
	
	$veiculo=[];
	$sql2 = "SELECT * FROM veiculo";
	$resultado = $pdo->query($sql2);
	while ($vc = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$veiculo[] = $vc;
	}
	
	$condutors=[];
	$sql3 = "SELECT * FROM condutor";
	$resultado = $pdo->query($sql3);
	while ($cd = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$condutors[] = $cd;
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
		<div class="container">
			  <div class="justify-content-center">
					<h3>Reservas</h3>
					<table class="table table-striped table-secondary">
						<tr>
							<th>Id</th>
							<th>Nº Vaga</th>
							<th>Id veiculo</th>
							<th>Id Condutor</th>
							<th>Entrada</th>
							<th>Saida</th>
							<th></th>
						</tr>
						<?php foreach($reserva as $lista): ?>
						<tr>
							<td><?=$lista['id'];?></td>
							<td><?=$lista['n_vaga'];?></td>
							<td><?=$lista['id_veiculo'];?></td>
							<td><?=$lista['id_condutor'];?></td>
							<td><?=$lista['entrada'];?></td>
							<td><?=$lista['saida'];?></td>
							<td>
								<a href="excluirR.php?id=<?=$lista['id'];?>"><input type="button" class="btn" value="Deletar"></a> 
								<a href="editarR.php?id=<?=$lista['id'];?>"><input type="button" class=" btn" value="Editar"></a>
							</td>
						</tr>
						<?php endforeach ; ?>
					</table>
					<a href="cadastroR.php"><input type="button" class="btn btn-dark" value="Cadastrar Reserva"></a>
					<br>
					<h3>Vagas</h3>
					<table class="table table-striped">
						<tr>
							<th>Numero</th>
							<th>Tipo</th>
							<th></th>
						</tr>
						<?php foreach($vaga as $vg): ?>
						<tr>
							<td><?=$vg['numero'];?></td>
							<td><?=$vg['tipo'];?></td>
							<td>
								<a href="excluirVa.php?id=<?=$vg['numero'];?>"><input type="button" class="btn" value="Deletar"></a> 
								<a href="editarVa.php?id=<?=$vg['numero'];?>"><input type="button" class=" btn" value="Editar"></a>
							</td>
						</tr>
						<?php endforeach ; ?>
					</table>
					<a href="cadastroVa.php"><input type="button" class="btn btn-dark" value="Cadastrar Vaga"></a>
					<br>
					<h3>Veiculos</h3>
					<table class="table table-striped table-secondary">
						<tr>
							<th>Id Veiculo</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Placa</th>
							<th>Cor</th>
							<th>Tipo</th>
							<th></th>
						</tr>
						<?php foreach($veiculo as $vc): ?>
						<tr>
							<td><?=$vc['id'];?></td>
							<td><?=$vc['marca'];?></td>
							<td><?=$vc['modelo'];?></td>
							<td><?=$vc['placa'];?></td>
							<td><?=$vc['cor'];?></td>
							<td><?=$vc['tipo'];?></td>
							<td>
								<a href="excluirVe.php?id=<?=$vc['id'];?>"><input type="button" class="btn" value="Deletar"></a> 
								<a href="editarVe.php?id=<?=$vc['id'];?>"><input type="button" class=" btn" value="Editar"></a>
							</td>
						</tr>
						<?php endforeach ; ?>
					</table>
					<a href="cadastroVe.php"><input type="button" class="btn btn-dark" value="Cadastrar Veiculo"></a>
					<br>
					<h3>Condutor</h3>
					<table class="table table-striped">
						<tr>
							<th>Id Condutor</th>
							<th>Nome</th>
							<th>CPF</th>
							<th>Telefone p/contato</th>
							<th></th>
						</tr>
						<?php foreach($condutors as $cd): ?>
						<tr>
							<td><?=$cd['id'];?></td>
							<td><?=$cd['nome'];?></td>
							<td><?=$cd['identificacao'];?></td>
							<td><?=$cd['telefone'];?></td>
							<td>
								<a href="excluirC.php?id=<?=$cd['id'];?>"><input type="button" class="btn" value="Deletar"></a> 
								<a href="editarC.php?id=<?=$cd['id'];?>"><input type="button" class=" btn" value="Editar"></a>
							</td>
						</tr>
						<?php endforeach ; ?>
					</table>
					<a href="cadastroC.php"><input type="button" class="btn btn-dark" value="Cadastrar Condutor"></a>
				</div>
			  
				<a href="logout.php" class="sair2"><img class="sair" src="cruz.png"></a>
			</div>

		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>
