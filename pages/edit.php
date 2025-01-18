<?php
require_once '../db.php';

$id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$query->execute([$id]);
$product = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
    $stmt->execute([$name, $description, $price, $id]);

    header("Location: list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center text-warning">Edit Product</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required><?= htmlspecialchars($product['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Product</button>
        <a href="list.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
