<?php

// 1. get all recipes
function getRecipes($pdo) {
    $stmt = $pdo->query("SELECT * FROM recipes ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 2. search
function searchRecipes($pdo, $keyword) {
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE name LIKE ? ORDER BY created_at DESC");
    $stmt->execute(["%$keyword%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 3. filter
function filterByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE category = ? ORDER BY created_at DESC");
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 4. sort
function sortRecipes($pdo, $order) {

    switch($order) {
        case "time_asc":
            $sql = "ORDER BY prep_time ASC";
            break;
        case "time_desc":
            $sql = "ORDER BY prep_time DESC";
            break;
        case "new":
            $sql = "ORDER BY created_at DESC";
            break;
        case "old":
            $sql = "ORDER BY created_at ASC";
            break;
        default:
            $sql = "ORDER BY created_at DESC";
    }

    $stmt = $pdo->query("SELECT * FROM recipes $sql");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}