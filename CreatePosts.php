<?php
$u = $_POST["u"];
$p = $_POST["p"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}

//If post empty
if ($p==NULL){
	printf("Post empty. Post not created.");
}
else {
	//Attempt insertion
	$query = 'INSERT INTO Posts (content, author_id) VALUES ("' . $p . '","' . $u . '")';
	if ($mysqli->query($query)) {
		printf("Post created successfully!");
	}
	//If user_id doesn't exist in Users table
	else {
		printf("User id " . $u . " does not exist. Post not created");
	}
}

/* close connection */
$mysqli->close();
?>
