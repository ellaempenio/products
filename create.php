<?php 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare('INSERT INTO products (name, description, price, quantity) values (?, ?, ?, ?)');
    $stmt ->execute([$name, $description, $price, $quantity]);

    header('Location: index.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id='name' name='name' required><br>
        <label for="description">Description:</label>
        <textarea name="description" name="description"></textarea><br>
        <label for="price">Price:</label>
        <input type="number" step=0.01 id="price" name="price" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>
        <button type="submit">Add Product</button>
    </form>
    <a href="index.php">Back to Product List</a>
</body>
</html>