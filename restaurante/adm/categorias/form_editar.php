<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

try {
    $id = $_GET["id"];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM res_categorias WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    
    $categoria = $stmt->fetch();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<html>
<body>

    <form action="editar.php?id=<?php echo $id; ?>" method="post">
        Nome: <input type="text" name="nome" value="<?php echo $categoria["nome"]; ?>"><br>
        <input value="Atualizar" type="submit">
        <input type="reset" value="Resetar">
    </form>

</body>
</html>
