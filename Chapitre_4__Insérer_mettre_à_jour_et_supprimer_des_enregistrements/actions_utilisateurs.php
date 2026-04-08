<?php
require "connexion";
$stmt = $pdo->prepare("UPDATE Utilisateur SET email = :email WHERE id = :id");
$stmt->execute([
    'email' => 'charlie.new@test.com',
    'id' => 3
]);
echo "Utilisateur mis à jour.";


?>