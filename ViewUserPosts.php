<?php
$u = $_POST["u"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

//check connection
if ($mysqli->connect_errno) {
	printf("Connect failed: %s", $mysqli->connect_error);
	exit();
}
//if no user selected
if ($u==""){
	printf("No user");
}
else{
	$query = "SELECT content FROM Posts WHERE author_id='" . $u . "'";

	if ($result = $mysqli->query($query)) {
		//Print header row
		printf("<table><tr><th>" . $u . "'s posts</th></tr>");
	
		//fetch associative array
		while ($row = $result->fetch_assoc()) {
			//Print each post
			printf ("<tr><td>%s</td></tr>", $row["content"]);
		}

		//End table
		printf("</table>");
	
		//free result set
		$result->free();
	}
}

//close connection
$mysqli->close();
?>
