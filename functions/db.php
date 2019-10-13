<?php

try{
    $pdo = new PDO('mysql:host=localhost; dbname=socialhub', 'root', '');
    
} catch (PDOException $e) {
    echo 'Connection error!'. $e->getMessage();
}

?>