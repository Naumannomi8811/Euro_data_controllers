<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guard_id = $_POST['guard_id'];
    $sl_name = $_POST['sl_name'];
    $sl_num = $_POST['sl_num'];
    $sl_exp = $_POST['sl_exp'];
    $st_id = $_POST['st_id'];
    $date = date("Y-m-d H:i:s");

    // Check if the guard already has a security license
    $chksql = "SELECT * FROM `security_licence` WHERE `guard_id`=?";
    $chkstmt = $connect->prepare($chksql);
    $chkstmt->bind_param("i", $guard_id);
    $chkstmt->execute();
    $chkresult = $chkstmt->get_result();

    if ($chkresult && $chkresult->num_rows > 0) {
        $row = $chkresult->fetch_assoc();
        $old_sl_img = $row['sl_img'];

        if (!empty($_FILES["sl_img"]["name"])) {
            // If a new image file is uploaded
            $targetDir = "media/security-licence/";
            $sl_img = basename($_FILES["sl_img"]["name"]);
            $targetFilePath = $targetDir . $sl_img;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["sl_img"]["tmp_name"], $targetFilePath)) {
                    // Update other fields along with the new image file
                    $updatesql = "UPDATE `security_licence` SET `name`=?, `sl_num`=?, `expiry_date`=?, `sl_img`=?, `st_id`=?, `date_added`=? WHERE `guard_id`=?";
                    $updatestmt = $connect->prepare($updatesql);
                    $updatestmt->bind_param("ssssisi", $sl_name, $sl_num, $sl_exp, $sl_img, $st_id, $date, $guard_id);
                    $updateresult = $updatestmt->execute();

                    if ($updateresult) {
                        // Delete the old image file if update is successful
                        if (!empty($old_sl_img)) {
                            unlink("media/security-licence/" . $old_sl_img);
                        }
                        $statusMsg = "Security license information updated successfully.";
                    } else {
                        $statusMsg = "Failed to update security license information. Please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your image.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
            }
        } else {
            // If no new image is uploaded, update other fields without modifying the image file
            $updatesql = "UPDATE `security_licence` SET `name`=?, `sl_num`=?, `expiry_date`=?, `st_id`=?, `date_added`=? WHERE `guard_id`=?";
            $updatestmt = $connect->prepare($updatesql);
            $updatestmt->bind_param("sssssi", $sl_name, $sl_num, $sl_exp, $st_id, $date, $guard_id);
            $updateresult = $updatestmt->execute();

            if ($updateresult) {
                $statusMsg = "Security license information updated successfully.";
            } else {
                $statusMsg = "Failed to update security license information. Please try again.";
            }
        }
    } else {
        // If no existing record found for the guard, insert a new record
        // Handle the image upload and other field insertions as per your requirements
        // ...
    }

    if (isset($statusMsg)) {
        header('Location: work-force.php');
        exit();
    }
}
?>
