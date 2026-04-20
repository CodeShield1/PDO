<?php
require_once "../db.php";

// JOIN recipes و categories
$sql = "SELECT recipes.*, categories.name AS category_name
        FROM recipes
        LEFT JOIN categories 
        ON recipes.category_id = categories.id";

$stmt = $pdo->query($sql);
$recipes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Liste des recettes</h1>

    <div style="text-align: right; margin-bottom: 20px;">
        <a href="creat.php" class="btn btn-primary">➕ Ajouter recette</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Temps</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recipes as $recipe): ?>
                <tr>
                    <td><?= htmlspecialchars($recipe['name']) ?></td>
                    <td><span class="badge"><?= htmlspecialchars($recipe['category_name']) ?></span></td>
                    <td><?= htmlspecialchars($recipe['prep_time']) ?> min</td>
                    <td>
                        <a href="update.php?id=<?= $recipe['id'] ?>" class="btn">✏️ Edit</a>
                        <a href="delete.php?id=<?= $recipe['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">❌ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>