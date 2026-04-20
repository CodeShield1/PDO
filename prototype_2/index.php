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
<a href="create.php" class="btn add-btn">➕ Ajouter</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if(empty($product)): ?>
            <tr>
                <td colspan="5" style="text-align:center;">Aucun produit trouvé</td>
            </tr>
        <?php else: ?>
            <?php foreach($product as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']) ?></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['price']) ?> DH</td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td>
                        <a href="edite.php?id=<?= $item['id'] ?>" class="btn-edit">✏️ Modifier</a>
                        <a href="delete.php?id=<?= $item['id'] ?>" class="btn-delete" onclick="return confirm('Êtes-vous sûr?')">🗑️ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
