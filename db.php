<?php
$host = 'localhost:3307';  // Add port number
$db   = 'xss_blog_db';
$user = 'root';           // Default XAMPP user
$pass = '';               // Default XAMPP password is empty

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>