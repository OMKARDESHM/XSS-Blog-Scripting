<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM comments ORDER BY created_at DESC");
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Post</title>
    <link rel="stylesheet" href="[https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap]">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .comment {
            background-color: #f7f7f7;
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }
        .comment:last-child {
            border-bottom: none;
        }
        .comment strong {
            font-weight: 600;
        }
        .comment small {
            color: #666;
        }
        .form-container {
            padding: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 10px;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
        .form-container button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Blog Post Title</h1>
        </div>
        <div class="content">
            <p>This is the content of the blog post.</p>
            <h2>Comments</h2>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <strong><?php echo htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
                    <p><?php echo nl2br(htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8')); ?></p>
                    <small><?php echo $comment['created_at']; ?></small>
                </div>
            <?php endforeach; ?>
            <h2>Leave a Comment</h2>
            <div class="form-container">
                <form action="submit_comment.php" method="post">
                    <label for="username">Name:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                    <button type="submit">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>