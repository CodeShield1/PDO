<?php

require "db.php";
require "functions.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id=$_GET['id'];
    Delete_Products($pdo,$id);
    header("Location: index.php");
    exit();
}
