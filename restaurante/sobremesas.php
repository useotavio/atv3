<table style='border: solid 1px black;'>
    <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Destaque</th>
    </tr>
<?php
$servername = "localhost";
$username = "user_otavio";
$password = "Otavio1@";
$dbname = "Otavio";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM res_produtos WHERE id_categoria = 11 ORDER BY nome;");
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
</table>