<?php
$dataFile = "../data.json";

if (file_exists($dataFile)) {
    $projects = json_decode(file_get_contents($dataFile), true);
} else {
    $projects = [];
}

echo json_encode(["data" => $projects]);
