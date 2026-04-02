<?php
require "db.php";

$stmt = $pdo->query("SELECT * FROM recipes ORDER BY created_at DESC");
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <link rel="stylesheet" href="styles.css">
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





<!-- 
CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category ENUM('Entree', 'Plat', 'Dessert') NOT NULL,
    prep_time INT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    edited_at DATETIME NULL
);
INSERT INTO recipes (name, category, prep_time, image) VALUES
('Salade Cesar', 'Entree', 20, 'images/salade.jpg'),
('Poulet roti', 'Plat', 60, 'images/poulet.jpg'),
('Tajine poulet citron', 'Plat', 90, 'images/tajine.jpg'),
('Cake au chocolat', 'Dessert', 45, 'images/cake.jpg'),
('Pancakes', 'Dessert', 25, 'images/pancakes.jpg'); -->