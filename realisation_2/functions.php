<?php
   require "db.php";

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