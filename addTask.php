<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	require('./connect.php');
	
	if(!$conn) {
	 	die('Connection failed: ' . $conn->connect_error);
	}
	
	if(isset($_POST['task'])) {
		$taskName = mysqli_real_escape_string($conn, $_POST['task']);
		$sql = "INSERT INTO tasks (`name`) VALUES (?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'SQL Statement failed';
		}
		mysqli_stmt_bind_param($stmt, 's', $taskName);
		mysqli_stmt_execute($stmt);

		if(!mysqli_errno($conn)) {
			header('Location: index.php');
		} else {
			echo 'Something went wrong during a SQL query';
		}
	
		die();
	}

	mysqli_close($conn);
}

?>