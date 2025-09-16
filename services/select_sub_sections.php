<?php
include 'connection/connection.php';

$section_id = $_GET['section_id'];

$result = $conn->query("SELECT id, sub_sec_name 
                        FROM public.tbl_sub_sections 
                        WHERE section_id = '$section_id' 
                        ORDER BY sub_sec_name ASC");

$features = [];
foreach($result as $row) {
    $features[] = $row;
}
echo json_encode($features);
?>

