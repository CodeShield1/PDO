<?php
require "db.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    Edite_Products($pdo, $id, $name, $price, $quantity);
    
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>✏️ Modifier Produit</h2>

    <form method="POST" class="form-container">
        
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        
        <div class="form-group">
            <label>Nom du produit</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>

        <div class="form-group">
            <label>Quantité</label>
            <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required>
        </div>

        <button type="submit">Modifier</button>
        <a href="index.php" class="btn-back">Retour</a>

    </form>
</div>

</body>
</html>
