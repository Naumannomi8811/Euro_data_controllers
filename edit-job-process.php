<?php  

include "config.php";    
if(isset($_POST['job_title']) ) {		
	$job_id = $_POST['job_id'];		
	$job_title = $_POST['job_title'];		
	$site_id = $_POST['site_id'];		
	$start_time = $_POST['start_time'];		
	$end_time = $_POST['end_time'];		
	$break_time = $_POST['break_time'];		
	$job_date = $_POST['job_date'];			
	$client_cost = $_POST['client_cost'];						
	$date = date("Y-m-d h:i:s");

	$sql = "UPDATE `jobs` SET  `site_id`='$site_id',
							`job_title`='$job_title',
							`start_time`='$start_time',
							`end_time`='$end_time',
							`break_time`='$break_time',
							`job_date`='$job_date',
							`client_cost`='$client_cost',
							`date_added`='$date' WHERE `job_id`='$job_id'";
	
	$result = $connect->query($sql);
			
	if($result){	
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Edit Job Details',
										'$date',
										'admin',
										'Admin edit job info!')";
		
		$aresult = $connect->query($asql);	
		header('location: jobs.php');
	} else {	
		echo'error';		
		header('location: edit-job.php');
	}
}
?>