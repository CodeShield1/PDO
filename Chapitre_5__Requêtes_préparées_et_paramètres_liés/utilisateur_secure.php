<?php

require "connexion.php";

$nom = 'Bob';
$email = 'bob@test.com';
$stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email) VALUES (:nom, :email)");
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':email', $email);
$stmt->execute();
