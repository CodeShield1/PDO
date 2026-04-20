<?php
function getCategories($pdo){
    $sql = "SELECT * FROM categories";
    return $pdo->query($sql)->fetchAll();
}


