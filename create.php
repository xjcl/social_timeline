<?php

// *** Create a single post in the database (content in request body)

$content = file_get_contents('php://input');

// disallow empty or all-space posts
$content = trim($content);
if ($content == "")
    return;

$content = mb_substr($content, 0, 140);

$con = new mysqli("mysql", "newuser", "user_password", "social");

$stmt = $con->prepare("INSERT INTO posts (content) VALUES (?)");
$stmt->bind_param('s', $content);
$stmt->execute();
$stmt->close();

?>
