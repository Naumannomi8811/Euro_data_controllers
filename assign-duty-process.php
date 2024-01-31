<?php   
include "config.php";
        
if(isset($_POST['job_id']) ) {					
	$job_id  = $_POST['job_id'];		
	$job_date = $_POST['job_date'];		
	$guard_id = $_POST['guard_id'];		
	$guard_cost = $_POST['guard_cost'];			
	$date = date("Y-m-d h:i:s");

	$sql = "INSERT INTO `duties`(
								`job_id`, 
								`guard_id`, 
								`guard_cost`, 
								`job_date`, 
								`date_added`
								) VALUES (
								'$job_id',
								'$guard_id',
								'$guard_cost',
								'$job_date',
								'$date')";

		
	$result = $connect->query($sql);
				
	if($result){		
		$jsql="UPDATE `jobs` SET  `job_status`='assigned' WHERE `job_id`='$job_id'";
		$jresult = $connect->query($jsql);
		
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Assign Duty',
										'$date',
										'admin',
										'Admin has assign duty to guard!')";
		$aresult = $connect->query($asql);
	
		header('location: duties.php');

	} else {
	
		echo'error';
		header('location: duties.php');

	}
	
}
    ?>