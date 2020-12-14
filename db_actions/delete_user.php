<?php

	include("db.php");

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM users WHERE id = $id";

		$result = mysqli_query($conn, $query);

		if(!$result) {
			die("Query Failed");
			echo $result;
		}
		
		$_SESSION['state_message']	= 'User Eliminated';
		$_SESSION['state_type'] = 'danger';

		header("Location: ../index.php");
	}
?>
