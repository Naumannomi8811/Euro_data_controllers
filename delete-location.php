<?php


include('config.php');
	
$site_id = $_GET['site_id'];

$date = date("Y-m-d h:i:s");

	
$sql = "DELETE FROM `sites` WHERE `site_id` = '$site_id'";
	
$result = $connect->query($sql);

	
if($result){ 
	
	$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Delete Site/ Locations',
										'$date',
										'admin',
										'Admin has Deleted a Location!')";
		
	
	$aresult = $connect->query($asql);
	
	header('location: locations.php');

} else {
	
	
	
	
	header('location: locations.php');
	
}


?>