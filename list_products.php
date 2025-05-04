<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require 'db.php';

$products = [];
$sql = "SELECT id, name, price, description FROM products";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Produtos - Banco de Produtos</title>
</head>
<body>
    <h1>Consulta de Produtos</h1>
    <p><a href="index.php">Página Inicial</a> | <a href="add_product.php">Cadastrar Produto</a> | <a href="logout.php">Sair</a></p>
    <?php if (count($products) === 0): ?>
        <p>Nenhum produto encontrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($product['price'], 2)); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td><a href="delete_product.php?id=<?php echo urlencode($product['id']); ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
