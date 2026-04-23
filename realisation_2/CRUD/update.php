<?php
require_once "../db.php";
require_once "../functions.php";

$categories = getCategories($pdo);

if (!isset($_GET['id'])) {
    header("Location: read.php");
    exit();
}

$id = $_GET['id'];
$recipe = getRecipeById($pdo, $id);

if (!$recipe) {
    header("Location: read.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST["name"];
    $prep_time = $_POST["prep_time"];
    $category_id = $_POST["category_id"];
    $imageName = $recipe['image']; // Default to old image

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $tmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($ext, $allowed)) {
            if ($fileSize <= 2 * 1024 * 1024) {
                // Delete old image if it exists
                if (!empty($recipe['image'])) {
                    $oldImagePath = "../images/" . $recipe['image'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $imageName = uniqid() . "." . $ext;
                $uploadPath = "../images/" . $imageName;
                move_uploaded_file($tmpName, $uploadPath);
            } else {
                $error = "❌ Image trop grande (max 2Mo)";
            }
        } else {
            $error = "❌ Format d'image non supporté";
        }
    }

    if (!isset($error)) {
        if (updateRecipe($pdo, $id, $name, $prep_time, $imageName, $category_id)) {
            header("Location: read.php");
            exit();
        } else {
            $error = "❌ Erreur lors de la mise à jour";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Modifier une Recette</title>
</head>
<body>
    <div class="container">
        <h1>Modifier la recette</h1>
        <?php if (isset($error)) echo "<div class='error-msg'>$error</div>"; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom de la recette :</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($recipe['name']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="prep_time">Temps de préparation (min) :</label>
                <input type="number" name="prep_time" id="prep_time" value="<?= htmlspecialchars($recipe['prep_time']) ?>" required>
            </div>

            <div class="form-group">
                <label for="category_id">Catégorie :</label>
                <select name="category_id" id="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= ($category['id'] == $recipe['category_id']) ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image actuelle :</label>
                <?php if (!empty($recipe['image'])): ?>
                    <div style="margin-bottom: 15px;">
                        <img src="../images/<?= htmlspecialchars($recipe['image']) ?>" alt="Actuelle" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0;">
                    </div>
                <?php endif; ?>
                <label for="image" style="color: var(--secondary); font-size: 0.8rem;">Modifier l'image (optionnel) :</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </div>
        </form>
        <a href="read.php">← Retour à la liste</a>
    </div>
</body>
</html>
