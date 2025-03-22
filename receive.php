<?php
// Set the default time zone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Function to generate a unique token ID
function generateToken()
{
    return bin2hex(random_bytes(2)); // Generate a random 4-character hexadecimal token
}

// Define the path to the JSON file
$jsonFilePath = 'janiya/data/received_sms.json';
// Define the path to the log file
$logFilePath = 'error.txt';

// Check if the JSON file exists, if not, create it
if (!file_exists($jsonFilePath)) {
    file_put_contents($jsonFilePath, json_encode([]));
}

// Check if the request method is POST and if the required parameters are set
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');

    // Write the raw data to the log file
    if (file_put_contents($logFilePath, date("Y-m-d H:i:s") . " - Raw data received: " . $rawData . PHP_EOL, FILE_APPEND | LOCK_EX)) {
        echo "Data received and logged successfully";
    } else {
        echo "Error logging data";
    }

    // Decode the JSON data
    $postData = json_decode($rawData, true);

    // Check if required parameters are set
    if (isset($postData['sender']) && isset($postData['message'])) {
        // Get the data sent from the Android app
        $sender = $postData['sender'];
        $message = $postData['message'];
        $date = date("Y-m-d H:i:s"); // Current date and time in IST
        $token = generateToken(); // Generate a unique token ID

        // Create an array with the received message data
        $smsData = array(
            'token' => $token,
            'sender' => $sender,
            'message' => $message,
            'received_date' => $date
        );

        // Read the existing JSON file content
        $jsonData = file_get_contents($jsonFilePath);

        // Decode JSON data into an associative array
        $receivedSMS = json_decode($jsonData, true);

        // Prepend the new message data to the array (so latest is on top)
        array_unshift($receivedSMS, $smsData);

        // Encode the array back into JSON format
        $jsonData = json_encode($receivedSMS, JSON_PRETTY_PRINT);

        // Open the JSON file for writing
        $file = fopen($jsonFilePath, 'w');
        if ($file) {
            // Write the updated JSON data to the file
            fwrite($file, $jsonData);

            // Close the file handle
            fclose($file);

            echo "SMS data received and saved successfully";
        } else {
            // Log error if unable to open JSON file for writing
            if (file_put_contents($logFilePath, date("Y-m-d H:i:s") . " - Error opening JSON file for writing" . PHP_EOL, FILE_APPEND | LOCK_EX)) {
                echo "Error opening JSON file for writing";
            } else {
                echo "Error opening JSON file for writing and logging error";
            }
        }
    } else {
        // Log error if invalid data received
        if (file_put_contents($logFilePath, date("Y-m-d H:i:s") . " - Invalid data received" . PHP_EOL, FILE_APPEND | LOCK_EX)) {
            echo "Invalid data received";
        } else {
            echo "Invalid data received and logging error";
        }
    }
} else {
    // Log error if invalid request
    if (file_put_contents($logFilePath, date("Y-m-d H:i:s") . " - Invalid request" . PHP_EOL, FILE_APPEND | LOCK_EX)) {
        echo "Invalid request";
    } else {
        echo "Invalid request and logging error";
    }
}
?>

