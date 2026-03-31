<?php
require 'connexion.php';

try {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($utilisateurs as $user) {
        echo "ID : " . $user['id'] . " - Nom : " . $user['full_name'] . " - Email : " . $user['email'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
