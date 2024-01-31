<?php  
include "config.php";

if(isset($_POST['submit'])) {
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $user_name = $_POST['username'];
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];
    $uphone = $_POST['uphone'];
    $u_type = $_POST['u_type'];
    $date = date("Y-m-d h:i:s");

    // Get the file name of the uploaded image
    $image_name = basename($_FILES["upic"]["name"]);

    $target_dir = "media/user-img/";
    $target_file = $target_dir . $image_name;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["upic"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file($_FILES["upic"]["tmp_name"], $target_file);
    } else {
        echo "File is not an image.";
        exit();
    }

    $sql = "INSERT INTO `users` (
        `username`,
        `password`,
        `first_name`,
        `last_name`,
        `email`,
        `phone`,
        `user_type`,
        `user_pic`,
        `date_created`
    ) VALUES (
        '$user_name',
        '$upass',
        '$f_name',
        '$l_name',
        '$uemail',
        '$uphone',
        '$u_type',
        '$image_name',
        '$date'
    )";

    $result = $connect->query($sql);
    
    if($result) {
        $asql = "INSERT INTO `activity_log` (
            `activity_type`,
            `timestamp`,
            `user`,
            `details`
        ) VALUES (
            'New User Added',
            '$date',
            'admin',
            'Admin has added new User!'
        )";
        $aresult = $connect->query($asql);
        header('location: users.php');
    } else {
        echo 'Error';
    }
} else {
    echo 'Form not submitted.';
}
?>
