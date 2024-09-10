<?php

require('connect.php');

if(!$conn) {
	die('Connection failed: ' . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
	$taskID = json_decode(file_get_contents('php://input'), true)["id"];
	$sql = "DELETE FROM tasks WHERE id='$taskID'";

	$query = mysqli_query($conn, $sql);
	if($query) {
		header('Refresh:0; url=./index.php');
	} else {
		echo 'Error while attempting the SQL query: ' . $sql;
	}

	die();
	mysqli_close($conn);
}

?>