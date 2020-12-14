<?php

include("db.php");

if(isset($_POST['edit_user'])) {
	$id = $_GET['id'];
	$userName =	$_POST['user_name'];
	$phoneNumber = $_POST['phone_number'];
	$userEmail = $_POST['user_email'];
	
	$query = "UPDATE users set name = '$userName', phone_number = '$phoneNumber', email = '$userEmail' WHERE id = $id";
	$result = mysqli_query($conn, $query);

		$_SESSION['state_message']	= 'User Updated';
		$_SESSION['state_type'] = 'info';

	header("Location: ../index.php");
}	

?>
