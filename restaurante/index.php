<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Restaurante</title>
</head>
<body>
	<header>
		<h1 style="text-align:center;">Cardápio</h1>
		<nav>
			<ul>
				<li><a href="adm/admin.php">Admin</a></li><br>
				<li>
					Categorias
					<table style='border: solid 1px black;'>
    					<tr>
        					<th style="text-align:center">Id</th>
        					<th style="text-align:center">Nome</th>
    					</tr>
<?php
	$servername = "localhost";
	$username = "user_otavio";
	$password = "Otavio1@";
	$dbname = "Otavio";

	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$stmt = $conn->prepare("SELECT * FROM res_categorias");
    	$stmt->execute();
    	while ($row = $stmt->fetch()) {
?>
    					<tr>
    					    <td><a href=""></a><?php echo $row['id']; ?></td>
    					    <td><?php echo $row['nome']; ?></td>
    					</tr>
<?php
    	}
	} catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
	$conn = null;
?>
					</table></li><br>
				<li>
					Produtos Destaques<br>
					<table style='border: solid 1px black;'>
    					<tr>
        					<th style="text-align:center">Id</th>
        					<th style="text-align:center">Categoria</th>
        					<th style="text-align:center">Nome</th>
        					<th style="text-align:center">Preço</th>
        					<th style="text-align:center">Descrição</th>
        					<th style="text-align:center">Destaque</th>
    					</tr>
<?php
	$servername = "localhost";
	$username = "user_otavio";
	$password = "Otavio1@";
	$dbname = "Otavio";

	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$stmt = $conn->prepare("SELECT * FROM res_produtos WHERE destaque = 1 ORDER BY id DESC LIMIT 2;");

    	$stmt->execute();
    	while ($row = $stmt->fetch()) {
?>
    					<tr>
        					<td style="text-align:center"><?php echo $row['id']; ?></td>
        					<td style="text-align:center"><?php echo $row['id_categoria']; ?></td>
        					<td><?php echo $row['nome']; ?></td>
        					<td>R$<?php echo $row['preco']; ?></td>
        					<td><?php echo $row['descricao']; ?></td>
        					<td style="text-align:center"><?php echo $row['destaque']; ?></td>
    					</tr>
<?php
    	}
	} catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
	$conn = null;
?>
					</table></li><br>
				<li>
					Produtos por categoria:
					<ul>
						<li><a href="entradas.php" target="janela">ENTRADAS</a></li>
						<li><a href="pratos.php" target="janela">PRATOS PRINCIPAIS</a></li>
						<li><a href="bebidas.php" target="janela">BEBIDAS</a></li>
						<li><a href="sobremesas.php" target="janela">SOBREMESAS</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>

	<iframe name="janela" width="100%" height="200"></iframe>

	<footer>
		<p style="text-align:right;">Copyright 2021 Otavio</p>
	</footer>
</body>
</html>