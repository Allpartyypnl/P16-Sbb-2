<?php
// Get the JSON data from the request
$data = file_get_contents("php://input");
if ($data) {
    $jsonData = json_decode($data, true);

    // Define the file path where the data will be saved
    $filePath = "user_data.json";

    // Check if the JSON file exists
    if (file_exists($filePath)) {
        // Append new data to the existing file
        $existingData = json_decode(file_get_contents($filePath), true);
        $existingData[] = $jsonData;
        file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT));
    } else {
        // Create a new JSON file
        file_put_contents($filePath, json_encode([$jsonData], JSON_PRETTY_PRINT));
    }

    // Respond with success status
    http_response_code(200);
    echo json_encode(["message" => "Data saved successfully."]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "No data received."]);
}
?>

