<?php
function connect_db(){
    $DATABASE_HOST = 'localhost';
    $DATABASE_NAME = 'crud';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';


    try {
    return $conn = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
}
?>