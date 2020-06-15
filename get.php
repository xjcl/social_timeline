<?php

// *** Fetch the 40 most recent posts from the database

$con = new mysqli("mysql", "newuser", "user_password", "social");
$result = $con->query("SELECT * FROM posts ORDER BY id DESC LIMIT 40");

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);

?>
