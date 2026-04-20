<?php
 $config=require "config.php";

try{

    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
    $pdo = new PDO($dsn, $config['username'], $config['password']);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // errorsxa
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // fetch clean
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // sécurité


}catch(PDOException $e){
    echo "❌ Database connection error ";
        echo $e->getMessage();
    exit(); 

}

?>




<!--

  console.log("brahim");
  echo "brahim";


-->