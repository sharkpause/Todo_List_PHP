<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	require('./connect.php');
	
	if(!$conn) {
	 	die('Connection failed: ' . $conn->connect_error);
	}
	
	if(isset($_POST['task'])) {
		$taskName = $_POST['task'];
		$sql = "INSERT INTO tasks (`name`) VALUES ('$taskName')";
	
		$query = mysqli_query($conn, $sql);
		if($query) {
			header('Location: ./index.php');
		} else {
			echo 'Error while attempting the SQL query: ' . $sql . ': ';
		}
	
		die();
	}

	mysqli_close($conn);
}

?>