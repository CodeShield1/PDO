<?php
require "db.php";
require "functions.php";

$product = getalldata($pdo);


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>📦 Liste des Produits</h1>

<div class="container">
    <?php if(empty($product)): ?>
        <p style="text-align:center;">Aucun produit trouvé</p>
    <?php else: ?>

        <?php foreach($product as $item): ?>
            <div class="card">
                <div class="content">
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <p class="price"><?= htmlspecialchars($item['price']) ?> DH</p>
                    <p class="quantity">Quantité: <?= htmlspecialchars($item['quantity']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>
</div>

</body>
</html>
