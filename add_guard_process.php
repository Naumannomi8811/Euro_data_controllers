<?php
include "config.php";
session_start();

if (isset($_POST['guard_name'], $_POST['email'], $_POST['phone'])) {
    $guard_name = $_POST['guard_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $phs = $_POST['phs'];
    $ni_num = $_POST['ni_num'];
    $sia = $_POST['sia'];
    $ctg_id = $_POST['ctg_id'];
    $date = date("Y-m-d h:i:s");
	
	$final_pass = md5($password);

    $sql = "INSERT INTO `guards`(
								`guard_name`, 
								`guard_email`, 
								`guard_phone`, 
								`guard_password`, 
								`guard_address`, 
								`guard_gender`, 
								`per_hour_salary`, 
								`guard_ctg`, 
								`ni_num`, 
								`sia_num`, 
								`date_added`
								) VALUES (
								'$guard_name',
								'$email',
								'$phone',
								'$final_pass',
								'$address',
								'$gender',
								'$phs',
								'$ctg_id',
								'$ni_num',
								'$sia',
								'$date')";

   
	$result = $connect->query($sql);
	if ($result) {
		$asql="INSERT INTO `activity_log`(`activity_type`, `timestamp`, `user`, `details`) VALUES ('New Employee Added',
			'$date','admin','Admin has added new Employee!')";
		$aresult = $connect->query($asql);
        $_SESSION['success_msg'] = "Staff Added Successfully!";
        header('Location: work-force.php');
        exit;
    } else {
        $_SESSION['success_msg'] = "Error in adding staff. Please try again later.";
        header('Location: add_staff.php');
        exit;
    }
}
?>
