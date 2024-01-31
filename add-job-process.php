<?php    
include "config.php";
       
if(isset($_POST['job_title']) ) {	
	$job_title = $_POST['job_title'];	
	$site_id = $_POST['site_id'];			
	$start_time = $_POST['start_time'];	
	$end_time = $_POST['end_time'];	
	$break_time = $_POST['break_time'];	
	$job_date = $_POST['job_date'];				
	$client_cost = $_POST['client_cost'];			
	$date = date("Y-m-d h:i:s");


	$sql = "INSERT INTO `jobs`( 
							`site_id`, 
							`job_title`, 
							`start_time`, 
							`end_time`, 
							`break_time`, 
							`job_date`, 
							`client_cost`, 
							`date_added`
							) VALUES (							
							'$site_id',
							'$job_title',
							'$start_time',
							'$end_time',
							'$break_time',
							'$job_date',
							'$client_cost',
							'$date')";

		$result = $connect->query($sql);
		
		if($result){
			
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'New Job Added',
										'$date',
										'admin',
										'Admin has added a new job!')";
		$aresult = $connect->query($asql);

	header('location: jobs.php');
} else {
	
			header('location: jobs.php');
}
	}
    ?>