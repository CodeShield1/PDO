<?php
require_once "../functions.php";
require "../db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Optional: Get the recipe to delete the image file
    $recipe = getRecipeById($pdo, $id);
    
    if ($recipe) {
        // Delete image file if it exists
        if (!empty($recipe['image'])) {
            $imagePath = "../images/" . $recipe['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        // Delete from database
        deleteRecipe($pdo, $id);
    }
}

// Redirect back to read.php
header("Location: read.php");
exit();
?>
