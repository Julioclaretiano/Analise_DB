<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require 'db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $description = $_POST['description'] ?? '';

    if ($name && $price) {
        $stmt = $conn->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $description);
        if ($stmt->execute()) {
            $message = "Product added successfully.";
        } else {
            $message = "Error adding product: " . $conn->error;
        }
        $stmt->close();
    } else {
        $message = "Name and price are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto - Banco de Produtos</title>
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <p><a href="index.php">Página Inicial</a> | <a href="list_products.php">Consultar Produtos</a> | <a href="logout.php">Sair</a></p>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="add_product.php">
        <label>Nome: <input type="text" name="name" required></label><br><br>
        <label>Preço: <input type="number" step="0.01" name="price" required></label><br><br>
        <label>Descrição: <textarea name="description"></textarea></label><br><br>
        <button type="submit">Cadastrar Produto</button>
    </form>
</body>
</html>
