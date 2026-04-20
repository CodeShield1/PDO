<?php
require "databse.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
   <h1>🍽️ Liste des Recettes</h1>

<div class="container">

<?php foreach($recipes as $recipe): ?>

    <div class="card">
        <img src="<?= htmlspecialchars($recipe['image']) ?>" alt="image">

        <div class="content">
            <h2><?= htmlspecialchars($recipe['name']) ?></h2>

            <p><strong>Catégorie:</strong> <?= htmlspecialchars($recipe['category']) ?></p>

            <p><strong>Temps:</strong> <?= htmlspecialchars($recipe['prep_time']) ?> min</p>

            <p class="date">
                Ajouté: <?= htmlspecialchars($recipe['created_at']) ?>
            </p>
        </div>
    </div>

<?php endforeach; ?>

</div>
</body>
</html>