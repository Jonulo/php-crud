<?php

include("db.php");

if(isset($_POST['save_user'])){
	
	$userName =	$_POST['user_name'];
	$phoneNumber = $_POST['phone_number'];
	$userEmail = $_POST['user_email'];
	$birthday = $_POST['birthday'];

	$query = "INSERT INTO users(name, phone_number, email, birthday) VALUES ('$userName','$phoneNumber', '$userEmail', '$birthday')";
	$result =	mysqli_query($conn, $query);

	if(!$result){
		die("query fail");
		echo $result;
	}

	$_SESSION['state_message'] = 'User saved';
	$_SESSION['state_type'] = 'success';

	header("Location: ../index.php");
}
?>
