<?php
require "./connection/connection.php"; // this defines $conn

header("Content-Type: application/json");

try {
    $stmt = $conn->query("
        SELECT 
            id,
            project_name AS project,
            client_name AS client,
            site_address,
            focal_person,
            district_name AS district,
            date_time AS date_created
        FROM rrmti.tbl_projects
        ORDER BY date_time DESC
    ");

    $projects = $stmt->fetchAll();

    echo json_encode([
        "data" => $projects
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "data" => [],
        "error" => $e->getMessage()
    ]);
}
