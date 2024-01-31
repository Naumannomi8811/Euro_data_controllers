<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $client_id = $_POST['client_id'];
    $proof_type = $_POST['proof_type'];
    $date = date("Y-m-d h:i:s");
    
    $targetDir = "media/client-img/add-proof/";
    $targetFilePath = "";
    
    if (!empty($_FILES["proof_img"]["name"])) {
        $proof_img = $_FILES["proof_img"]["name"];
        $targetFilePath = $targetDir . basename($proof_img);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        
        if (!in_array($fileType, $allowTypes)) {
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["proof_img"]["tmp_name"], $targetFilePath)) {
                $statusMsg = "Image uploaded successfully.";
            } else {
                $statusMsg = "Error uploading image.";
            }
        }
    } else {
        $statusMsg = "Please select an image.";
    }
    
    if (!empty($client_id) && !empty($proof_type)) {
        $sql = "SELECT * FROM `address_proof` WHERE `client_id`=?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $updateSql = "UPDATE `address_proof` SET `proof_type`=?, `proof_img`=?, `date_added`=? WHERE `client_id`=?";
            $updateStmt = $connect->prepare($updateSql);
            $updateStmt->bind_param("ssss", $proof_type, $proof_img, $date, $client_id);
            if ($updateStmt->execute()) {
                $statusMsg = "Address proof updated successfully.";
            } else {
                $statusMsg = "Error updating address proof.";
            }
        } else {
            $insertSql = "INSERT INTO `address_proof`(`client_id`, `proof_type`, `proof_img`, `date_added`) VALUES (?, ?, ?, ?)";
            $insertStmt = $connect->prepare($insertSql);
            $insertStmt->bind_param("ssss", $client_id, $proof_type, $proof_img, $date);
            if ($insertStmt->execute()) {
                $statusMsg = "Address proof added successfully.";
            } else {
                $statusMsg = "Error adding address proof.";
            }
        }
    } else {
        $statusMsg = "Client ID and Proof Type are required.";
    }
    
    header('Location: clients.php?status=' . urlencode($statusMsg));
    exit;
}

?>
