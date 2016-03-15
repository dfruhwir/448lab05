<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

//check connection
if ($mysqli->connect_errno) {
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}

$query = "SELECT post_id, author_id, content FROM Posts";

if ($result = $mysqli->query($query)) {
	//Print header row
	printf("<table><tr><th>Delete?</th><th>User</th><th>Post</th></tr>");
		
	//fetch associative array
	while ($row = $result->fetch_assoc()) {
		printf("<tr><td><input type='checkbox' value='%s'></td><td>%s</td><td>%s</td></tr>", $row["post_id"], $row["author_id"], $row["content"]);
	}
	printf("</table>");
	
	//free result set
	$result->free();
}

//close connection
$mysqli->close();
?>
