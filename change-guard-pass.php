<?php
include('config.php');
$guard_id = $_POST['guard_id'];
$old_pass = $_POST['old_pass'];		
$new_pass = $_POST['new_pass'];							
$date = date("Y-m-d h:i:s");

if(isset($_POST['guard_id'])){ 	
	$final_old = md5($old_pass);	
	$chksql = "SELECT * FROM `guards` WHERE `guard_id`='$guard_id' && `guard_password`='$old_pass'";						
	$chkr=mysqli_query($connect,$chksql);	
	
	if($chkr){    					
		$final_new = md5($new_pass);			
		$sql = "UPDATE `guards` SET `guard_password`='$final_new', `date_added`='$date' WHERE `guard_id`='$guard_id'";								
		$r=mysqli_query($connect,$sql);	
				
		header('Location: clients.php');		
	}else{    	
		echo json_encode(array('message'=>"Error In updating Password",'status'=>false));		
	}       
}else{
	header('Location: work-force.php');
}


?>