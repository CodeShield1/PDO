<?php
require "db.php";
require "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    Create_Products($pdo, $name, $price, $quantity);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>➕ Ajouter Produit</h2>

    <form method="POST" class="form-container">
        
        <div class="form-group">
            <label>Nom du produit</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Quantité</label>
            <input type="number" name="quantity" required>
        </div>

        <button type="submit">Ajouter</button>
        <a href="index.php" class="btn-back">Retour</a>

    </form>
</div>

</body>
</html>
