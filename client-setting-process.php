<?php
include('config.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phone = $_POST['c_phone'];
    $c_address = $_POST['c_address'];
    $others = $_POST['others'];
    $gst = $_POST['gst'];
    $pan = $_POST['pan'];
    $pc = $_POST['pc'];
    $vat = $_POST['vat'];
	$cn = $_POST['cn'];
    $date = date("Y-m-d H:i:s");

    $targetDir = "media/client-img/";
    

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

    $avatar = uploadImage("avatar", $targetDir);
   
    if ($avatar === false) {
        $statusMsg = "Error uploading images. Only JPG, JPEG, PNG, GIF files are allowed.";
    } else {
        // Use prepared statement to prevent SQL injection
        $sql = "UPDATE use SET 
								client_name=?,
								client_email=?,
								client_phone=?,
								other_details=?,
								client_address=?,
								gst_num=?,
								pan_num=?,
								profile_pic=?,
								post_code=?,
								vat=?,
								company_name=?,
								date_added=? WHERE client_id=?";

        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssssssssssss", $c_name, $c_email, $c_phone, $others, $c_address, $gst, $pan, $avatar, $pc, $vat, $cn, $date, $c_id);

        if ($stmt->execute()) {
            $statusMsg = "Client information updated successfully.";
			header('Location: clients.php');
        } else {
            $statusMsg = "Error updating guard information: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
