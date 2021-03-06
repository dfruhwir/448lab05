<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

//check connection
if ($mysqli->connect_errno) {
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}

$query = "SELECT post_id FROM Posts";

if ($result = $mysqli->query($query)) {
	//fetch associative array
	while ($row = $result->fetch_assoc()) {
		//See if post checked
		$p = $_POST[$row["post_id"]];

		//If checked
		if ($p == $row["post_id"]) {
			//Attempt deletion
			$del = "DELETE FROM Posts WHERE post_id=" . $p;
			if ($mysqli->query($del)) {
				printf("post_id " . $p . " deleted.<br>");
			}
			else {
				printf("post_id " . $p . " failed to delete.<br>");
			}
		}
	}
	
	
	//free result set
	$result->free();
}

//close connection
$mysqli->close();
?>
