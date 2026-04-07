<?php



require "db.php";
require "functions.php";

$id = $_GET['id'];

deleteRecipe($pdo, $id);

header("Location: index.php");

exit;