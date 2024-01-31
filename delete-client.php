<?php
include('config.php');	
$client_id = $_GET['client_id'];
$date = date("Y-m-d h:i:s");

$sql = "DELETE FROM `clients` WHERE `client_id` = '$client_id'";	
$result = $connect->query($sql);
	
if($result){ 		
	$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Delete Client',
										'$date',
										'admin',
										'Admin has Deleted a Client!')";
	
	$aresult = $connect->query($asql);	
	header('location: clients.php');	
} else {				
	header('location: clients.php');
}
?>