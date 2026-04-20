<?php

$pdo = new PDO("mysql:host=localhost;dbname=pdo", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT username, email FROM users");
$users = $stmt->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>

    <style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 200px;
            border-radius: 10px;
        }
    </style>

</head>
<body>

<h2>Users</h2>

<?php foreach($users as $user): ?>
    
    <div class="card">
        <h3><?php echo $user['username']; ?></h3>
        <p><?php echo $user['email']; ?></p>
    </div>

<?php endforeach; ?>

</body>
</html>