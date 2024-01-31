<?php
include('config.php');
$guard_id = $_GET['guard_id']; 
$query = "SELECT * FROM guards WHERE guard_id='$guard_id'";
$result = mysqli_query($connect, $query);
    $grow = mysqli_fetch_assoc($result);
?>