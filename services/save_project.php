<?php
$dataFile = "../data.json";

$newProject = [
    "project" => $_POST['project'],
    "client" => $_POST['client'],
    "ref" => $_POST['ref'],
    "gr" => $_POST['gr'],
    "lab" => $_POST['lab'],
    "receiving_date" => $_POST['receiving_date']
];

if (file_exists($dataFile)) {
    $projects = json_decode(file_get_contents($dataFile), true);
} else {
    $projects = [];
}

$projects[] = $newProject;
file_put_contents($dataFile, json_encode($projects, JSON_PRETTY_PRINT));

echo json_encode(["success" => true]);
