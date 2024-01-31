<?php

include('config.php');
	$guard_id = $_GET['guard_id'];
$date = date("Y-m-d h:i:s");

	$sql = "DELETE FROM `guards` WHERE `guard_id`='$guard_id'";
	$result = $connect->query($sql);

	if($result){ 
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Delete Employee',
										'$date',
										'admin',
										'Admin has Deleted a Employee info!')";
		
	
	$aresult = $connect->query($asql);
	
		header('location: work-force.php');
	} else {
		echo "<script>alert('Some error occurred. Try again')</script>";
		header('location: workforce.php');
	}


?>