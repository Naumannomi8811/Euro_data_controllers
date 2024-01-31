<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $client_id = $_POST['client_id'];
    $proof_type = $_POST['proof_type'];
    $date = date("Y-m-d h:i:s");

    // Retrieve existing data from the database
    $stmt = $connect->prepare("SELECT * FROM `address_proof` WHERE `client_id` = ?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $existing_data = $result->fetch_assoc();

        // Check if the submitted data is different from the existing data
        if ($existing_data['proof_type'] !== $proof_type || !empty($_FILES["proof_img"]["name"])) {
            // Perform the update only if changes are detected

            // Handle the image upload and update the database
            $targetDir = "static/avatars/";
            $proof_img = $_FILES["proof_img"]["name"];
            $targetFilePath = $targetDir . basename($proof_img);
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["proof_img"]["tmp_name"], $targetFilePath)) {
                    // Update the database with new data
                    $updateStmt = $connect->prepare("UPDATE `address_proof` SET `proof_type` = ?, `proof_img` = ?, `date_added` = ? WHERE `client_id` = ?");
                    $updateStmt->bind_param("sssi", $proof_type, $proof_img, $date, $client_id);

                    if ($updateStmt->execute()) {
                        $statusMsg = "Address proof updated successfully.";
                    } else {
                        $statusMsg = "Error updating address proof.";
                    }
                } else {
                    $statusMsg = "Error uploading image.";
                }
            } else {
                $statusMsg = "Only JPG, JPEG, PNG, GIF files are allowed.";
            }
        } else {
            // No changes made, retain existing data
            $statusMsg = "No changes made to the address proof.";
        }
    } else {
        // No existing data found, handle accordingly
    }

    // Redirect with the appropriate status message
    header('Location: clients.php?status=' . urlencode($statusMsg));
    exit;
}
?>
