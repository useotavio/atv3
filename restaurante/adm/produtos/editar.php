<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

$id = $_GET["id"];
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

    $sql = "UPDATE res_produtos SET id_categoria=?, nome=?, preco=?, descricao=?, destaque=? WHERE id=?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_categoria);
    $stmt->bindParam(2, $nome);
    $stmt->bindParam(3, $preco);
    $stmt->bindParam(4, $descricao);
    $stmt->bindParam(5, $destaque);
    $stmt->bindParam(6, $id);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " Registro ATUALIZADOS com sucesso! ";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
