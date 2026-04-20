
<?php
require_once "../db.php";

// categories select
$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();

// إلا user دار submit
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $prep_time = $_POST['prep_time'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO recipes(name, prep_time, category_id)
            VALUES(:name, :prep_time, :category_id)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 
        'name' => $name,
        'prep_time' => $prep_time,
        'category_id' => $category_id
    ]);

    header("Location: read.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Recette</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container" style="max-width: 600px;">
    <h1>Ajouter une recette</h1>

    <form method="POST">

        <div class="form-group">
            <label>Nom de la recette</label>
            <input type="text" name="name" placeholder="Ex: Tajine de poulet" required>
        </div>

        <div class="form-group">
            <label>Temps de préparation (min)</label>
            <input type="number" name="prep_time" placeholder="Ex: 45" required>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <select name="category_id" required>
                <option value="">-- Choisir une catégorie --</option>
                <?php foreach($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>">
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">🚀 Ajouter la recette</button>
            <a href="read.php" class="btn" style="width: 100%; margin-top: 10px; text-align: center;">🔙 Retour</a>
        </div>

    </form>
</div>

</body>
</html>





