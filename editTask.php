<?php


if($_SERVER['REQUEST_METHOD'] === 'PUT') {
	require('connect.php');

	if(!$conn) {
		die('Connection failed: ' . $conn->connect_error);
	}

	$payload = json_decode(file_get_contents('php://input'), true);
	$taskID = $payload['id'];
	$newTask = $payload['newTask'];

	$sql = "UPDATE tasks SET name = '$newTask' WHERE id = $taskID";

	$query = mysqli_query($conn, $sql);
	if($query) {
		header('Location: ./index.php');
	} else {
		echo 'Error while attempting the SQL query ' . $sql;
	}
}

?>