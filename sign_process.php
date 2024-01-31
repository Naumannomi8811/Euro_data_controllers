<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro_security";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email`= '$user_email' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email address or password";
        header("Location: login.php");
        exit();
    }
}

mysqli_close($conn);
?>
