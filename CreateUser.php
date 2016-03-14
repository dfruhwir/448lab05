<?php
$u = $_POST["u"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s", $mysqli->connect_error);
    exit();
}

if ($u==NULL){
	printf("User id empty. User not created");
}
else {
	$query = "INSERT INTO Users (user_id) VALUES ('" . $u . "')";
	if ($mysqli->query($query)) {
		printf("User " . $u . " created successfully!");
	}
	else {
		printf("User id taken. User not created");
	}
}

/* close connection */
$mysqli->close();
?>
