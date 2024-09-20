<?php

if($_SERVER['REQUEST_METHOD'] === 'PUT') {
	require('connect.php');

	if(!$conn) {
		die('Connection failed: ' . $conn->connect_error);
	}

	$payload = json_decode(file_get_contents('php://input'), true);
	$taskID = mysqli_real_escape_string($conn, $payload['id']);
	$newTask = mysqli_real_escape_string($conn, $payload['newTask']);

	$sql = "UPDATE tasks SET name = '?' WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'SQL Statement failed';
	}
	mysqli_stmt_bind_param($stmt, 'si', $newTask, $taskID);
	mysqli_stmt_execute($stmt);

	mysqli_close($conn);
}

?>