<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banco de Produtos - Página Inicial</title>
</head>
<body>
    <h1>Bem-vindo ao Banco de Produtos</h1>
    <p><a href="add_product.php">Cadastrar Produto</a> | <a href="list_products.php">Consultar Produtos</a> | <a href="logout.php">Sair</a></p>
</body>
</html>
