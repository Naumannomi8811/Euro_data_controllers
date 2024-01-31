<?php
include('config.php');
	
$job_id = $_GET['job_id'];
$date = date("Y-m-d h:i:s");

	
$sql = "DELETE FROM `jobs` WHERE `job_id`='$job_id'";
$result = $connect->query($sql);

if($result){ 
	$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Delete Job',
										'$date',
										'admin',
										'Admin has Deleted a Job!')";
		
	$aresult = $connect->query($asql);	
	header('location: jobs.php');	
} else {		
	header('location: jobs.php');	
}
?>