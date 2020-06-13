<?php

// *** Fetch the 40 most recent posts from the database

$con = mysqli_connect("mysql", "newuser", "user_password", "social");
$result = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC LIMIT 40");

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);

?>
