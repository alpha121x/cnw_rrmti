<?php
$dataFile = "data.json";

// Get POST data
$newData = json_decode(file_get_contents("php://input"), true);

// Read existing data
$jsonData = [];
if (file_exists($dataFile)) {
    $jsonData = json_decode(file_get_contents($dataFile), true);
}

// Add new record at the top
array_unshift($jsonData, $newData);

// Save back to file
file_put_contents($dataFile, json_encode($jsonData, JSON_PRETTY_PRINT));

echo json_encode(["status" => "success", "message" => "Test added successfully"]);
