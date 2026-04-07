<?php
require "db.php";
require "functions.php";

$name = $_POST['name'];
$category = $_POST['category'];
$prep_time = $_POST['prep_time'];
$image = $_POST['image'];

insertRecipe($pdo, $name, $category, $prep_time, $image);


header("Location: index.php");
exit;




?>