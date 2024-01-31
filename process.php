<?php 
$guard_id = $_POST['g_id'];
    $g_name = $_POST['g_name'];
    $g_email = $_POST['g_email'];
    $g_phone = $_POST['g_phone'];
    $g_address = $_POST['g_address'];
    $phs = $_POST['phs'];
    $gender = $_POST['gender'];
    $id_card = $_POST['id_card'];
    $g_ctg = $_POST['g_ctg'];
    $nin = $_POST['nin'];
    $sia = $_POST['sia'];
    $date = date("Y-m-d H:i:s");
	
	
	

    // Handle image uploads
    function uploadImage($fieldName, $targetDir) {
        if (!empty($_FILES[$fieldName]["name"])) {
            $avatarName = $_FILES[$fieldName]["name"];
            $targetFilePath = $targetDir . basename($avatarName);
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFilePath)) {
                    return $avatarName;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        return null;
    }

    $targetDir = "media/guard-img/";
    $targetDirIdProof = "media/guard-img/id-proof/";

    $avatar = uploadImage("avatar", $targetDir);
    $id_card = uploadImage("id_card", $targetDirIdProof);

    if ($avatar === false || $id_card === false) {
        $statusMsg = "Error uploading images. Only JPG, JPEG, PNG, GIF files are allowed.";
    } else {
        $sql = "UPDATE guards SET 
                guard_name = '$g_name',
                guard_email = '$g_email',
                guard_phone = '$g_phone',						
                guard_address = '$g_address',
                guard_gender = '$gender',
                per_hour_salary = '$phs',
                dp = '$avatar',
                id_card = '$id_card',
                guard_ctg = '$g_ctg',						
                ni_num = '$nin',
                sia_num = '$sia',
                date_added = '$date'
                WHERE guard_id = '$guard_id'";

        $result = $connect->query($sql);

        if ($result) {
            $statusMsg = "Guard information updated successfully.";
            header('Location: guard-profile.php');
        } else {
            $statusMsg = "Error updating guard information: " . $connect->error;
        }
    }
?>