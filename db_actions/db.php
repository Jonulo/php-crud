<?php

session_start();

$conn = mysqli_connect(
	'localhost:9001',
	'root',
	'',
	'users_crud'
);
	
/* if(isset($conn)) { */
/* 	echo 'DB is connected'; */
/* } */
?>
