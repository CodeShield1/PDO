<?php

try{
$pdo = new PDO("mysql:host=localhost;dbname=pdo","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];

   $hashpassword=password_hash($password,PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, full_name, password, email) VALUES (?, ?, ?,?)");
    $stmt->execute([$username, $full_name,$hashpassword,$email]);

    $user = $stmt->fetch();

       echo "User registered ✅";

}
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>







<form method="POST">
    <label for="username">username</label>
    <input type="text" id="username" name="username" placeholder="Username"><br>

     <label for="full_name">full_name</label>
    <input type="text" id="full_name" name="full_name" placeholder="Username"><br>


    <label for="password">password</label>
    <input type="password" name="password" placeholder="Password"><br>

    <label for="email">email</label>
    <input type="email" id="email" name="email" placeholder="email"><br>
    
    <button type="submit">Login</button>
</form>