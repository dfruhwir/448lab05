<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "dfruhwir", "sql448", "dfruhwir");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users ORDER by ID DESC LIMIT 50,5";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s\n", $row["user_id"]);
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
