<?php


include('config.php');
	
$user_id = $_GET['user_id'];

$date = date("Y-m-d h:i:s");

	
$sql = "DELETE FROM `users` WHERE `user_id` = '$user_id'";
	
$result = $connect->query($sql);

	
if($result){ 
	
	$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Delete User',
										'$date',
										'admin',
										'Admin has Deleted a User!')";
		
	
	$aresult = $connect->query($asql);
	
	header('location: users.php');

} else {
	
	
	
	
	header('location: users.php');
	
}


?>