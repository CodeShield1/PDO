<?php

$host ="localhost";
$dbname="products";
$username="root";
$password ="";

$dsn="mysql:host=$host;dbname=$dbname;charset=utf8";
try{
    $pdo=new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
  echo"Erreur : ".$e->getMessage();
}



// CREATE TABLE Products (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(100) NOT NULL,
//     price DECIMAL(10,2) NOT NULL,
//     quantity INT NOT NULL
// );