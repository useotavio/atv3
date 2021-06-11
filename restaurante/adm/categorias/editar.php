<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";
$id = $_GET["id"];
$nome = $_POST["nome"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE res_categorias SET nome=? WHERE id=?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $id);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " Registro atualizado com sucesso! ";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
