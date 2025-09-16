<?php
header('Content-Type: application/json');

$dataFile = "data.json";

// Get POST data
$input = file_get_contents("php://input");
if ($input === false) {
    echo json_encode(["status" => "error", "message" => "No data received"]);
    exit;
}

$newData = [];
parse_str($input, $newData); // Fallback for simple key-value pairs if FormData is not properly handled

// Handle FormData (multipart/form-data)
if (empty($newData) && isset($_FILES)) {
    $newData = $_POST; // Get POST data
    foreach ($_POST as $key => $value) {
        $newData[$key] = $value;
    }
}

// Ensure required basic fields are present
if (!isset($newData['test_no']) || !isset($newData['performer_name']) || !isset($newData['section'])) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit;
}

// Read existing data
$jsonData = [];
if (file_exists($dataFile)) {
    $jsonData = json_decode(file_get_contents($dataFile), true) ?: [];
}

// Prepare new record with all fields
$record = [
    'section' => $newData['section'],
    'sub_section' => $newData['sub_section'] ?? '',
    'test_no' => $newData['test_no'],
    'performer_name' => $newData['performer_name'],
    'txt_comment' => $newData['txt_comment'] ?? '',
    'test_type' => $newData['test_type'] ?? '', // Derived from the form context
    'timestamp' => date('Y-m-d H:i:s'), // Add timestamp for record tracking
];

// Add test-specific fields based on test type
if (isset($newData['client'])) { // Bitumen Extraction
    $record = array_merge($record, [
        'client' => $newData['client'],
        'reference_no' => $newData['reference_no'],
        'gr' => $newData['gr'],
        'lab_no' => $newData['lab_no'],
        'location' => $newData['location'],
        'sieve_1' => $newData['sieve_1'] ?? null,
        'sieve_3_4' => $newData['sieve_3_4'] ?? null,
        'sieve_1_2' => $newData['sieve_1_2'] ?? null,
        'sieve_3_8' => $newData['sieve_3_8'] ?? null,
        'sieve_no4' => $newData['sieve_no4'] ?? null,
        'sieve_no8' => $newData['sieve_no8'] ?? null,
        'sieve_no50' => $newData['sieve_no50'] ?? null,
        'sieve_no200' => $newData['sieve_no200'] ?? null,
        'asphalt_content' => $newData['asphalt_content'] ?? null,
        'remarks' => $newData['remarks'] ?? ''
    ]);
} elseif (isset($newData['project'])) { // Bitumen Grade 60-70 or 80-100
    $record = array_merge($record, [
        'project' => $newData['project'],
        'client' => $newData['client'],
        'ref' => $newData['ref'],
        'gr' => $newData['gr'],
        'lab' => $newData['lab'],
        'receiving_date' => $newData['receiving_date'],
        'foaming' => $newData['foaming'] ?? '',
        'flash_point' => $newData['flash_point'] ?? null,
        'penetration' => $newData['penetration'] ?? null,
        'softening_point' => $newData['softening_point'] ?? null,
        'ductility' => $newData['ductility'] ?? null,
        'solubility' => $newData['solubility'] ?? null,
        'specific_gravity' => $newData['specific_gravity'] ?? null,
        'loss_on_heating' => $newData['loss_on_heating'] ?? null,
        'ductility_residue' => $newData['ductility_residue'] ?? null,
        'penetration_residue' => $newData['penetration_residue'] ?? null,
        'remarks' => $newData['remarks'] ?? ''
    ]);
    $record['test_type'] = isset($newData['penetration']) && $newData['penetration'] >= 60 && $newData['penetration'] <= 70 ? 'Bitumen Grade 60-70' : 'Bitumen Grade 80-100';
}

// Add new record at the top
array_unshift($jsonData, $record);

// Save back to file
if (file_put_contents($dataFile, json_encode($jsonData, JSON_PRETTY_PRINT)) === false) {
    echo json_encode(["status" => "error", "message" => "Failed to save data"]);
    exit;
}

echo json_encode(["status" => "success", "message" => "Test added successfully"]);
?>