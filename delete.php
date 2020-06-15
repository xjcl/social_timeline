<?php

// *** Delete a single post from the database using its id

// only allow numbers
$id = preg_replace( "/[^0-9]/", "", $_REQUEST["id"] );

$con = new mysqli("mysql", "newuser", "user_password", "social");

$stmt = $con->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param('s', $id);
$stmt->execute();
$stmt->close();

?>
