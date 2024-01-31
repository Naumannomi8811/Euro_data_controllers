<?php
include('config.php');
if(isset($_POST['submit'])){ 
$client_id = $_POST['client_id'];
$old_pass = $_POST['old_pass'];		
$new_pass = $_POST['new_pass'];							
$date = date("Y-m-d h:i:s");

if(isset($_POST['client_id'])){ 	
	$final_old = md5($old_pass);	
	$chksql = "SELECT clients.* FROM clients WHERE clients.client_id = '$client_id' AND clients.`password` = '$final_old'";						
	$chkr=mysqli_query($connect,$chksql);	
	
	if($chkr){    					
		$final_new = md5($new_pass);			
		$sql = "UPDATE `clients` SET  `password`='$final_new', `date_added`='$date' WHERE `client_id`='$client_id'";								
		$r=mysqli_query($connect,$sql);	
				
		header('Location: clients.php');		
	}else{    	
		echo json_encode(array('message'=>"Error In updating Password",'status'=>false));		
	}       
}else{
	header('Location: clients.php');
}

}
?>