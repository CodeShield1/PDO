<?php

require "db.php";
require "functions.php";

$id = $_POST['id'];
$name = $_POST['name'];
$category = $_POST['category'];
$prep_time = $_POST['prep_time'];
$image = $_POST['image'];

updateRecipe($pdo, $id, $name, $category, $prep_time, $image);

header("Location: index.php");
exit;