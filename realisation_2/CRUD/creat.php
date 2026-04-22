<?php

 require_once "../db.php";
 require_once "../functions.php";  

 

 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories = getCategories($pdo);
    $name = $_POST["name"];
    $prep_time = $_POST["prep_time"];
    $category_id = $_POST["category_id"];
    
    // Image Upload Logic
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $target = "../images/" . $image_name;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image = $image_name;
        }
    }

    if (createRecipe($pdo, $name, $prep_time, $image, $category_id)) {
        header("Location: read.php");
        exit();
    }
 } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ajouter une Recette</title>
</head>
<body>
    <div class="container">
        <h1>Ajouter une nouvelle recette</h1>
        <form action="POST" method="POST" enctype="multipart/form-data">
            <div>
                <label for="name">Nom de la recette :</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div>
                <label for="prep_time">Temps de préparation (min) :</label>
                <input type="number" name="prep_time" id="prep_time" required>
            </div>

            <div>
                <label for="category_id">Catégorie :</label>
                <select name="category_id" id="category_id" required>
                    <option value="">--Choisir une catégorie--</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>

            <button type="submit">Ajouter</button>
        </form>
        <a href="read.php">Retour à la liste</a>
    </div>
</body>
</html>