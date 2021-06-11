<table style='border: solid 1px black;'>
    <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Destaque</th>
        <th>Ações</th>
    </tr>
<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM res_produtos");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['id_categoria']; ?></td>
        <td><?php echo $row['nome']; ?></td>
        <td><?php echo $row['preco']; ?></td>
        <td><?php echo $row['descricao']; ?></td>
        <td><?php echo $row['destaque']; ?></td>
        <td>
            <a href="form_editar.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a href="apagar.php?id=<?php echo $row['id']; ?>">Apagar</a>
        </td>
    </tr>
<?php
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
</table>