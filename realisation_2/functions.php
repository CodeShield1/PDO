<?php
   require_once __DIR__ . "/db.php";

   function getRecipes($pdo){
      $sql="SELECT recipes.*,categories.name AS category_name
      FROM recipes
      LEFT join categories
      ON recipes.category_id = categories.id";  
      
      $stmt=$pdo->prepare($sql);
      $stmt->execute();
      $product = $stmt->fetchAll();
      return $product;

   }


   function getCategories($pdo) {
      $sql = "SELECT * FROM categories";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
   }

   function createRecipe($pdo, $name, $prep_time, $image, $category_id) {
      $sql = "INSERT INTO recipes (name, prep_time, image, category_id) 
      VALUES (:name, :prep_time, :image, :category_id)";
      
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([ "name"=>$name,
                              "prep_time"=>$prep_time,
                              "image"=>$image,
                              "category_id"=>$category_id]
      );
   }

   function deleteRecipe($pdo, $id) {
      $sql = "DELETE FROM recipes WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute(['id' => $id]);
   }

   function getRecipeById($pdo, $id) {
      $sql = "SELECT * FROM recipes WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
   }

   function updateRecipe($pdo, $id, $name, $prep_time, $image, $category_id) {
      $sql = "UPDATE recipes SET name = :name, prep_time = :prep_time, image = :image, category_id = :category_id WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      return $stmt->execute([
          'id' => $id,
          'name' => $name,
          'prep_time' => $prep_time,
          'image' => $image,
          'category_id' => $category_id
      ]);
   }






