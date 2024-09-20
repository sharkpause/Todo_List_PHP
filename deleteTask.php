<?php

require('connect.php');

if(!$conn) {
	die('Connection failed: ' . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
	$taskID = mysqli_real_escape_string($conn, json_decode(file_get_contents('php://input'), true)["id"]);
	$sql = "DELETE FROM tasks WHERE id=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		echo 'SQL Statement failed';
	}
	mysqli_stmt_bind_param($stmt, 'i', $taskID);
	mysqli_stmt_execute($stmt);

	die();
	mysqli_close($conn);
}

?>