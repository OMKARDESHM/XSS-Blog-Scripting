<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $comment = trim($_POST['comment']);

    if (!empty($username) && !empty($comment)) {
        $stmt = $pdo->prepare("INSERT INTO comments (username, comment) VALUES (:username, :comment)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();
    }

    header("Location: index.php"); // Redirect back to the main page after comment submit
    exit();
}
?>