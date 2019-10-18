<?php

try{
    $pdo = new PDO('mysql:host=localhost; dbname=socialshub', 'root', '');
    
} catch (PDOException $e) {
    echo 'Connection error!'. $e->getMessage();
}

?>