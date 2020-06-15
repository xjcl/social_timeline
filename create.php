<?php

// *** Create a single post in the database (content in request body)

$content = file_get_contents('php://input');

// maximum post length 140 chars (560 bytes)
$content = mb_substr($content, 0, 140);

// limit to 2 consecutive newlines
$content = preg_replace( "/\n\s*\n/", "\n\n", $content );

// disallow empty or all-space posts, trim superfluous space
$content = trim($content);
if ($content == "")
    return;

$con = new mysqli("mysql", "newuser", "user_password", "social");

$stmt = $con->prepare("INSERT INTO posts (content) VALUES (?)");
$stmt->bind_param('s', $content);
$stmt->execute();
$stmt->close();

?>
