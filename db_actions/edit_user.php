<?php

include("db.php");

if(isset($_POST['edit_user'])) {
	$id = $_POST['user_id'];
	$userName =	$_POST['user_name'];
	$phoneNumber = $_POST['phone_number'];
	$userEmail = $_POST['user_email'];
	$birthday = $_POST['birthday'];
	
	$query = "UPDATE users set name = '$userName', phone_number = '$phoneNumber', email = '$userEmail', birthday = '$birthday' WHERE id = $id";
	$result = mysqli_query($conn, $query);

		$_SESSION['state_message']	= 'User Updated';
		$_SESSION['state_type'] = 'info';

	header("Location: ../index.php");
}	

?>
