<?php
require '../db.php';
require '../functions.php';

$recipes = getRecipes($pdo );
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
                <h1>Mes Recettes</h1>
                <a href="creat.php" class="btn btn-primary">+ Ajouter</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Aperçu</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recipes as $recipe): ?>
                        
                        <tr>

                            <td>
                                # <?= htmlspecialchars($recipe['id']) ?>
                            </td>
                            <td>
                                <img src="../images/<?= htmlspecialchars($recipe['image']) ?>" class="recipe-img">
                            </td>
                            <td>
                                <strong><?= htmlspecialchars($recipe['name']) ?></strong>
                                <div style="font-size: 0.7rem; color: var(--secondary)"><?= $recipe['prep_time'] ?> min</div>
                            </td>
                            <td><span class="category-badge"><?= htmlspecialchars($recipe['category_name'] ?? 'aucun') ?></span></td>
                            <td style="text-align: right;">
                                <a href="update.php?id=<?= $recipe['id'] ?>" class="btn btn-edit">Modifier</a>
                                <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn btn-delete" onclick="return confirm('Supprimer ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 2rem; text-align: center;">
            <a href="../index.php" style="color: var(--secondary); text-decoration: none; font-size: 0.8rem;">← Accueil</a>
        </div>
    </div>
</body>
</html>