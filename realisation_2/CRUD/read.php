<?php
require '../db.php';
require '../functions.php';

$recipes = getRecipes($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Liste des Recettes</title>
</head>
<body>
    <div class="container">
        <h1>Liste des Recettes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td><?= htmlspecialchars($recipe['id']) ?></td>
                        <td><strong><?= htmlspecialchars($recipe['name'] ?? $recipe['title'] ?? 'N/A') ?></strong></td>
                        <td><span class="text-muted"><?= htmlspecialchars($recipe['category_name'] ?? 'Aucune') ?></span></td>
                        <td style="text-align: right;">
                            <a href="update.php?id=<?= $recipe['id'] ?>" class="btn-edit">Modifier</a>
                            <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn-delete" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-4">
            <a href="creat.php" class="btn btn-primary">Ajouter une nouvelle recette</a>
        </div>
    </div>
</body>
</html>