<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";
$nome = $_POST["nome"];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $sql = "INSERT INTO res_categorias (nome) VALUES (?)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $nome);
  $stmt->execute();
  
  $last_id = $conn->lastInsertId();
  echo "Novo registro criado com sucesso. O último ID inserido foi: " . $last_id;
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
