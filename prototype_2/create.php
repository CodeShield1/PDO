<?php
require "db.php";
require "functions.php";

$erreurs = [];
$name = $price = $quantity = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);

    if (empty($name)) {
        $erreurs[] = "Le nom du produit est obligatoire.";
    }
    
    if (empty($price)) {
        $erreurs[] = "Le prix est obligatoire.";
    } elseif (!is_numeric($price) || $price <= 0) {
        $erreurs[] = "Le prix doit être un nombre positif.";
    }
    
    if (empty($quantity)) {
        $erreurs[] = "La quantité est obligatoire.";
    } elseif (!is_numeric($quantity) || $quantity < 0) {
        $erreurs[] = "La quantité doit être un nombre positif ou zéro.";
    }

    if (empty($erreurs)) {
        Create_Products($pdo, $name, $price, $quantity);
        header("Location: index.php");
        exit();
    }
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

    <?php if (!empty($erreurs)): ?>
        <div class="error-box">
            <ul>
                <?php foreach ($erreurs as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" class="form-container">
        
        <div class="form-group">
            <label>Nom du produit</label>
            <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" step="0.01" value="<?= htmlspecialchars($price) ?>">
        </div>

        <div class="form-group">
            <label>Quantité</label>
            <input type="number" name="quantity" value="<?= htmlspecialchars($quantity) ?>">
        </div>

        <button type="submit">Ajouter</button>
        <a href="index.php" class="btn-back">Retour</a>

    </form>
</div>

</body>
</html>
