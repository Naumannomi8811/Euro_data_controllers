<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $company = $_POST['company'];
    $user_type = $_POST['user_type'];

    $targetDir = 'media/user-img/';
    $avatar = null;

    if (!empty($_FILES['avatar']['name'])) {
        $avatarName = $_FILES['avatar']['name'];
        $targetFilePath = $targetDir . basename($avatarName);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($fileType, $allowTypes) && move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFilePath)) {
            $avatar = $avatarName;
        }
    }

    $date = date('Y-m-d H:i:s');

    // Check if the image file was not uploaded
    if ($avatar === null) {
        // Fetch the existing image file name
        $stmt = $connect->prepare("SELECT user_pic FROM users WHERE user_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && isset($result['user_pic'])) {
            $avatar = $result['user_pic']; // Set the existing image file name
        }
    }

    $stmt = $connect->prepare("UPDATE users SET 
        `username` = ?,
        `first_name` = ?,
        `last_name` = ?,
        `email` = ?,
        `phone` = ?,
        `address` = ?,
        `company` = ?,
        `user_type` = ?,
        `user_pic` = ?,
        `date_created` = ?
        WHERE `user_id` = ?");

    if ($stmt) {
        $stmt->bind_param("sssssssssss", $username, $first_name, $last_name, $email, $phone, $address, $company, $user_type, $avatar, $date, $user_id);

        if ($stmt->execute()) {
            $statusMsg = "User information updated successfully.";
            header('Location: users.php');
            exit();
        } else {
            $statusMsg = "Error updating user information.";
        }
    } else {
        $statusMsg = "Statement preparation error.";
    }
}
?>
