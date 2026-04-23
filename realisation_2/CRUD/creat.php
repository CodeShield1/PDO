<?php

    require_once "../db.php";
    require_once "../functions.php";  

    $categories = getCategories($pdo);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST["name"];
        $prep_time = $_POST["prep_time"];
        $category_id = $_POST["category_id"];

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

            $file = $_FILES['image'];
            $fileName = $file['name'];
            $tmpName = $file['tmp_name'];
            $fileSize = $file['size'];

            // extension
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // allowed types (pro way)
            $allowed = ['jpg', 'jpeg', 'png'];

            if (in_array($ext, $allowed)) {

                // size limit (2MB)
                if ($fileSize <= 2 * 1024 * 1024) {

                    // unique name
                    $newName = uniqid() . "." . $ext;

                    $uploadDir = "../images/";
                   $path = $uploadDir . $newName;
                
                    // move file
                    if (move_uploaded_file($tmpName, $path)) {

                        // insert to DB
                        if (createRecipe($pdo, $name, $prep_time, $newName, $category_id)) {
                            header("Location: read.php");
                            exit();
                        }

                    } else {
                        $error = "❌ Error uploading file";
                    }

                } else {
                   $error = "❌ File too large (max 2MB)";
                }

            } else {
               $error = "❌ Only JPG, JPEG, PNG allowed";
            }

        } else {
          $error = "❌ No file selected";
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
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form action="creat.php" method="POST" enctype="multipart/form-data">
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