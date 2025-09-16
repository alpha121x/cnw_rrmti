<?php
header('Content-Type: application/json');

$dataFile = "data.json";

// Read existing data
$jsonData = [];
if (file_exists($dataFile)) {
    $jsonData = json_decode(file_get_contents($dataFile), true) ?: [];
}

// Prepare records for response, filtering for Bituminous section
$records = [];
foreach ($jsonData as $index => $record) {
    if (isset($record['section']) && $record['section'] === 'Bituminous') {
        $records[] = [
            'id' => $index, // Use index as a simple ID (can be improved with a unique ID in the future)
            'section' => $record['section'] ?? '',
            'sub_section' => $record['sub_section'] ?? '',
            'test_no' => $record['test_no'] ?? '',
            'performer_name' => $record['performer_name'] ?? '',
            'status' => 'Completed', // Default status (can be enhanced based on logic)
            'comment' => $record['txt_comment'] ?? $record['remarks'] ?? '',
        ];
    }
}

// Return JSON response
echo json_encode(['records' => $records]);
?>