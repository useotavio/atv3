<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

try {
    $id = $_GET["id"];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM res_produtos WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    
    $produto = $stmt->fetch();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<html>
<body>

    <form action="editar.php?id=<?php echo $id; ?>" method="post">
        Categoria: <input type="number" name="id_categoria" value="<?php echo $produto['id_categoria'] ?>"><br>
        Nome: <input type="text" name="nome" value="<?php echo $produto["nome"]; ?>"><br>
        Preço: <input type="number" name="preco" value="<?php echo $produto["preco"]; ?>"><br>
        Descrição: <input type="text" name="descricao" value="<?php echo $produto["descricao"]; ?>"><br>
        Destaque: <input type="checkbox" name="destaque" value="true" <?php echo ($produto["destaque"] == 1) ? 'checked':''; ?>><br>
        <input type="submit" value="Atualizar">
        <input type="reset" value="Resetar">
    </form>

</body>
</html>
