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



// INSERT INTO Products (name, price, quantity) VALUES
// ('Laptop Dell XPS 15', 1299.99, 45),
// ('iPhone 15 Pro', 999.00, 120),
// ('Samsung Galaxy S24', 849.99, 87),
// ('Sony WH-1000XM5 Headphones', 349.99, 200),
// ('iPad Air 11"', 599.00, 65),
// ('Logitech MX Master 3 Mouse', 99.99, 310),
// ('Mechanical Keyboard Keychron K8', 89.99, 150),
// ('4K Monitor LG 27"', 499.99, 40),
// ('External SSD Samsung T7 1TB', 109.99, 230),
// ('Webcam Logitech C920', 79.99, 175),
// ('USB-C Hub 7-in-1', 49.99, 420),
// ('Wireless Charger Anker 15W', 35.99, 580),
// ('MacBook Pro M3 14"', 1999.00, 30),
// ('AirPods Pro 2nd Gen', 249.00, 95),
// ('Nintendo Switch OLED', 349.99, 60),
// ('PS5 DualSense Controller', 69.99, 145),
// ('Action Camera GoPro Hero 12', 399.99, 55),
// ('Smart Watch Galaxy Watch 6', 279.99, 110),
// ('Portable Speaker JBL Flip 6', 129.99, 260),
// ('Raspberry Pi 5 Kit', 89.99, 185);