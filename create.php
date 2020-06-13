<?php

// *** Create a single post in the database (content in request body)

$request_body = file_get_contents('php://input');

// disallow empty or all-space posts
$request_body = trim($request_body);
if ($request_body == "")
    return;

$con = mysqli_connect("mysql", "newuser", "user_password", "social");

$content = mysqli_real_escape_string($con, $request_body);
$content = substr($content, 0, 140);

mysqli_query($con, "INSERT INTO posts (content) VALUES ('$content')");
mysqli_commit($con);

?>
