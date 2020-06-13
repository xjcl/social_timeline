<?php

// *** Delete a single post from the database using its id

// only allow numbers
$id = preg_replace( "/[^0-9]/", "", $_REQUEST["id"] );

$con = mysqli_connect("mysql", "newuser", "user_password", "social");
mysqli_query($con, "DELETE FROM posts WHERE id = " . $id);
mysqli_commit($con);

?>
