f<?php  

include "config.php";
  
if(isset($_POST['add-site']) ) {			
	$site_title = $_POST['site_title'];	
	$client_id = $_POST['client_id'];	
	$address = $_POST['address'];	
	$city = $_POST['city'];	
	$date = date("Y-m-d h:i:s");

	$sql = "INSERT INTO `sites`( `client_id`, 
								`site_title`, 
								`site_address`, 
								`site_city`, 
								`date_added`
								) VALUES (
								 '$client_id',
								 '$site_title',
								 '$address',
								 '$city',
								 '$date')";
		
	$result = $connect->query($sql);				
	if($result){	
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Add New Location',
										'$date',
										'admin',
										'Admin added a site!')";
		
		$aresult = $connect->query($asql);
	
		
		header('location: Locations.php');

	
	} else {
	
	
		echo'error';
		header('location: Locations.php');

	
	}
	

}
    
?>