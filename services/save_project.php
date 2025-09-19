<?php
session_start();
require_once("./connection/connection.php");

try {
    $project_name   = $_POST['project_name'] ?? '';
    $site_address   = $_POST['site_address'] ?? '';
    $client_name    = $_POST['client_name'] ?? '';
    $focal_person   = $_POST['focal_person'] ?? '';
    $fc_contact_no  = $_POST['fc_contact_no'] ?? '';
    $officer_id     = $_POST['officer_id'] ?? '';
    $district_name  = $_POST['district_name'] ?? '';
    $ref_letter_no  = $_POST['ref_letter_no'] ?? '';

    $letterPath = null;
    if (!empty($_FILES['letter_document']['name'])) {
        $uploadDir = __DIR__ . "/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName   = time() . "_" . basename($_FILES['letter_document']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['letter_document']['tmp_name'], $targetFile)) {
            $letterPath = "uploads/" . $fileName;
        }
    }

    $stmt = $conn->prepare("
        INSERT INTO rrmti.tbl_projects 
        (project_name, site_address, client_name, focal_person, fc_contact_no, officer_id, district_name, ref_letter_no, letter_document, created_by_user_id, date_time)
        VALUES
        (:project_name, :site_address, :client_name, :focal_person, :fc_contact_no, :officer_id, :district_name, :ref_letter_no, :letter_document, :created_by_user_id, NOW())
    ");

    $stmt->execute([
        ':project_name'   => $project_name,
        ':site_address'   => $site_address,
        ':client_name'    => $client_name,
        ':focal_person'   => $focal_person,
        ':fc_contact_no'  => $fc_contact_no,
        ':officer_id'     => $officer_id,
        ':district_name'  => $district_name,
        ':ref_letter_no'  => $ref_letter_no,
        ':letter_document'=> $letterPath,
        ':created_by_user_id' => $_SESSION['user_id'] ?? 1
    ]);

    echo json_encode(["success" => true, "message" => "Project saved successfully"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
