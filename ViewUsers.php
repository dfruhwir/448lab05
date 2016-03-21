<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

//check connection
if ($mysqli->connect_errno) {
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
	//Print header row
	printf("<table><tr><th>user_id</th></tr>");

	//fetch associative array
	while ($row = $result->fetch_assoc()) {
		//Print each user id
		printf ("<tr><td>%s</td></tr>", $row["user_id"]);
	}
	printf("</table>");

	//free result set
	$result->free();
}

//close connection
$mysqli->close();
?>
