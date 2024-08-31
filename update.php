<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $stmt = $pdo->prepare('UPDATE products SET name = ?, description = ?, price = ?, quantity = ? WHERE id = ?');
    $stmt->execute([$name, $description, $price, $quantity, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $product['name'] ?>" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?=$product['description'] ?></textarea><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= $product['price'] ?>" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?= $product['quantity'] ?>" required><br>
        <button type="submit">Update Product</button>
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>