<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

$id_categoria = $_POST["id_categoria"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];

if ($_POST['destaque'] == 'true') {
  $destaque = 1;
}else{
  $destaque = 0;
}


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $sql = "INSERT INTO res_produtos (id_categoria, nome, preco, descricao, destaque) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $id_categoria);
  $stmt->bindParam(2, $nome);
  $stmt->bindParam(3, $preco);
  $stmt->bindParam(4, $descricao);
  $stmt->bindParam(5, $destaque);
  $stmt->execute();
  
  $last_id = $conn->lastInsertId();
  echo " Novo registro CRIADO com sucesso. O último ID inserido foi: " . $last_id;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
