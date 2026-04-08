<?php
require "db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->execute([$id]);
$recipe = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>

<h1>✏️ Edit Recipe</h1>

<div class="form-container">

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?= $recipe['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= $recipe['name'] ?>" required>

    <label>Category:</label>
    <select name="category">
        <option value="Entree" <?= $recipe['category'] == 'Entree' ? 'selected' : '' ?>>Entree</option>
        <option value="Plat" <?= $recipe['category'] == 'Plat' ? 'selected' : '' ?>>Plat</option>
        <option value="Dessert" <?= $recipe['category'] == 'Dessert' ? 'selected' : '' ?>>Dessert</option>
    </select>

    <label>Preparation Time:</label>
    <input type="number" name="prep_time" value="<?= $recipe['prep_time'] ?>" required>

    <label>Image:</label>
    <input type="text" name="image" value="<?= $recipe['image'] ?>">

    <button type="submit">Update</button>

</form>

</div>

</body>
</html>