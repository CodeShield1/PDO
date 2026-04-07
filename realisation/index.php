<?php
require "db.php";
require "functions.php";


$recipes = getRecipes($pdo);

if(isset($_GET['search']) && $_GET['search'] != "") {
    $recipes = searchRecipes($pdo, $_GET['search']);
}


if(isset($_GET['category']) && $_GET['category'] != "") {
    $recipes = filterByCategory($pdo, $_GET['category']);
}


if(isset($_GET['sort']) && $_GET['sort'] != "") {
    $recipes = sortRecipes($pdo, $_GET['sort']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 style="text-align:center;">🍽️ Recettes</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search...">

    <select name="category">
        <option value="">All</option>
        <option value="Entree">Entree</option>
        <option value="Plat">Plat</option>
        <option value="Dessert">Dessert</option>
    </select>

    <select name="sort">
        <option value="">Sort</option>
        <option value="time_asc">Temps ↑</option>
        <option value="time_desc">Temps ↓</option>
        <option value="new">Plus récents</option>
        <option value="old">Plus anciens</option>
    </select>

    <button type="submit">OK</button>

    <a href="create.php" class="btn">➕ Ajouter</a>

</form>


<div class="container">

    <?php if(empty($recipes)): ?>
        <p style="text-align:center;"> Aucune recette trouvée</p>
    <?php endif; ?>

    <?php foreach($recipes as $recipe): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($recipe['image']) ?>">

            <div class="content">
                <h3><?= htmlspecialchars($recipe['name']) ?></h3>
                <p><?= htmlspecialchars($recipe['category']) ?></p>
                <p><?= htmlspecialchars($recipe['prep_time']) ?> min</p>
                
                <a href="delete.php?id=<?= $recipe['id'] ?>" 
                class="btn-delete"
                onclick="return confirm('Are you sure?')">
                Delete
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>