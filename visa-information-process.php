<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guard_id = $_POST['guard_id'];
    $visa_type = $_POST['visa_type'];
    $visa_expiry = $_POST['expiry_date'];
    $date = date("Y-m-d h:i:s");

    // File upload handling
    $targetDirectory = "static/avatars/"; // Set your upload directory
    $fileName = basename($_FILES["visa_img"]["name"]);
    $targetFile = $targetDirectory . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["visa_img"]["tmp_name"]);
    if ($check !== false) {
        // Check file size
        if ($_FILES["visa_img"]["size"] > 5000000) { // Adjust file size limit as needed
            $statusMsg = "Sorry, your file is too large.";
        } else {
            // Allow only specific file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $statusMsg = "Sorry, only JPG, JPEG, PNG files are allowed.";
            } else {
                // Upload file if all checks pass
                if (move_uploaded_file($_FILES["visa_img"]["tmp_name"], $targetFile)) {
                    $statusMsg = "File uploaded successfully.";

                    // Extract file name for database storage
                    $file_name_for_db = $fileName;

                    // Database operation: Insert or update visa information
                    $existingDataQuery = "SELECT * FROM `guard_visa` WHERE `guard_id` = '$guard_id'";
                    $result = mysqli_query($connect, $existingDataQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // Update existing visa information
                        $updateSql = "UPDATE `guard_visa` SET  
                            `visa_type` = '$visa_type',
                            `visa_expiry` = '$visa_expiry',
                            `date_added` = '$date',
                            `visa_img` = '$file_name_for_db'  
                            WHERE `guard_id` = '$guard_id'";

                        $updateResult = mysqli_query($connect, $updateSql);

                        if ($updateResult) {
                            $statusMsg .= " Visa updated successfully.";
                        } else {
                            $statusMsg .= " Error updating visa.";
                        }
                    } else {
                        // Insert new visa information
                        $insertSql = "INSERT INTO `guard_visa`(`guard_id`, `visa_type`, `visa_expiry`, `date_added`, `visa_img`) 
                                      VALUES ('$guard_id', '$visa_type', '$visa_expiry', '$date', '$file_name_for_db')";

                        $insertResult = mysqli_query($connect, $insertSql);

                        if ($insertResult) {
                            $statusMsg .= " Visa added successfully.";
                        } else {
                            $statusMsg .= " Error adding visa.";
                        }
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }
        }
    } else {
        $statusMsg = "File is not an image.";
    }

    // Redirect with status message
    header('Location: work-force.php?status=' . urlencode($statusMsg));
    exit;
}
?>
