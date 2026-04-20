<?php
require_once "db.php";

$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll();
?>

<h2>Categories</h2>

<?php foreach($categories as $cat): ?>
  <p><?= $cat['name'] ?></p>
<?php endforeach; ?>

<a href="crud/create.php">Add Category</a>