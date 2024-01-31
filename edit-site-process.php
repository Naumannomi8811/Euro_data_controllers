  
<?php  
 
include "config.php";
  
  
  
if(isset($_POST['edit-site']) ) {
		
	$site_id = $_POST['site_id'];
	
	$site_title = $_POST['site_title'];
	
	$client_id = $_POST['client_id'];
	
	$address = $_POST['address'];
	
	$city = $_POST['city'];

	$date = date("Y-m-d h:i:s");


	$sql = "UPDATE `sites` SET   `client_id`='$client_id',
							`site_title`='$site_title',
							`site_address`='$address',
							`site_city`='$city',
							`date_added`='$date' WHERE `site_id`='$site_id'";

		
	$result = $connect->query($sql);
		
		
	if($result){
	
		$asql="INSERT INTO `activity_log`(
										`activity_type`, 
										`timestamp`, 
										`user`, 
										`details`
										) VALUES (
										'Edit Location Information',
										'$date',
										'admin',
										'Admin edit location information!')";
		
		
		$aresult = $connect->query($asql);
	
	
		header('location: locations.php');

	} else {
	

		header('location: edit-location.php');

	}
	
}
    
?>