<?php
require "db.php";


function getalldata($pdo){
    $sql ="SELECT * FROM products";  
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function Create_Products($pdo ,$name ,$price ,$quantity){
    $sql="INSERT INTO products (name ,price,quantity) 
    VALUES (?,?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$name , $price , $quantity]);
}


function Delete_Products($pdo,$id){
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$id]);
}

function Edite_Products($pdo,$id,$name,$price,$quantity){
    $sql=" UPDATE products 
        SET name = ?, price = ?, quantity = ?
        WHERE id = ?";

    $stmt=$pdo->prepare($sql);
    $stmt->execute([$name,$price,$quantity,$id]);

}




