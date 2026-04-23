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
        <div class="table-card">
            <div class="card-header">
                <h1>Gestion des Recettes</h1>
                <a href="creat.php" class="btn btn-primary">+ Ajouter une recette</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aperçu</th>
                        <th>Nom de la Recette</th>
                        <th>Catégorie</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recipes as $recipe): ?>
                        <tr>
                            <td class="recipe-id">#<?= htmlspecialchars($recipe['id']) ?></td>
                            <td>
                                <?php if (!empty($recipe['image'])): ?>
                                    <img src="../images/<?= htmlspecialchars($recipe['image']) ?>" alt="Image" class="recipe-img">
                                <?php else: ?>
                                    <div class="recipe-img" style="background: #f1f5f9; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #94a3b8;">N/A</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="recipe-name"><?= htmlspecialchars($recipe['name'] ?? 'Sans nom') ?></div>
                                <div style="font-size: 0.75rem; color: var(--secondary);"><?= htmlspecialchars($recipe['prep_time']) ?> min de préparation</div>
                            </td>
                            <td>
                                <span class="category-badge"><?= htmlspecialchars($recipe['category_name'] ?? 'Général') ?></span>
                            </td>
                            <td class="actions-cell">
                                <a href="update.php?id=<?= $recipe['id'] ?>" class="btn btn-edit">Modifier</a>
                                <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn btn-delete" onclick="return confirm('Supprimer définitivement cette recette ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 2rem; text-align: center;">
            <a href="../index.php" style="color: var(--secondary); text-decoration: none; font-size: 0.9rem;">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>