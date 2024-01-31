<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guard_id = $_POST['g_id'];
    $g_name = $_POST['g_name'];
    $g_email = $_POST['g_email'];
    $g_phone = $_POST['g_phone'];
    $g_address = $_POST['g_address'];
    $phs = $_POST['phs'];
    $gender = $_POST['gender'];
    $g_ctg = $_POST['g_ctg'];
    $nin = $_POST['nin'];
    $sia = $_POST['sia'];
    $date = date("Y-m-d H:i:s");

    $targetDir = "media/guard-img/";
    $targetDirIdProof = "media/guard-img/id-proof/";

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
    $id_card = uploadImage("id_card", $targetDirIdProof);

    // Check if avatar or id card is empty, if so, fetch the existing data from the database
    if (empty($avatar)) {
        // Fetch existing avatar image path from the database for this guard
        $avatarQuery = $connect->query("SELECT dp FROM guards WHERE guard_id = $guard_id");
        $avatarRow = $avatarQuery->fetch_assoc();
        $avatar = $avatarRow['dp'];
    }

    if (empty($id_card)) {
        // Fetch existing id card image path from the database for this guard
        $idCardQuery = $connect->query("SELECT id_card FROM guards WHERE guard_id = $guard_id");
        $idCardRow = $idCardQuery->fetch_assoc();
        $id_card = $idCardRow['id_card'];
    }

    if ($avatar === false || $id_card === false) {
        $statusMsg = "Error uploading images. Only JPG, JPEG, PNG, GIF files are allowed.";
    } else {
        // Use prepared statement to prevent SQL injection
        $sql = "UPDATE guards SET 
                guard_name = ?,
                guard_email = ?,
                guard_phone = ?,						
                guard_address = ?,
                guard_gender = ?,
                per_hour_salary = ?,
                dp = ?,
                id_card = ?,
                guard_ctg = ?,						
                ni_num = ?,
                sia_num = ?,
                date_added = ?
                WHERE guard_id = ?";

        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssssdsssssss", $g_name, $g_email, $g_phone, $g_address, $gender, $phs, $avatar, $id_card, $g_ctg, $nin, $sia, $date, $guard_id);

        if ($stmt->execute()) {
            $statusMsg = "Guard information updated successfully.";
            header('Location: work-force.php');
        } else {
            $statusMsg = "Error updating guard information: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
