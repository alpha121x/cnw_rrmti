<?php
include 'connection/connection.php';

$result = $conn->query("select id, section_name from public.tbl_sections order by section_name asc");
$features=[];
foreach($result AS $row) {
    array_push($features, $row);
}
echo json_encode($features);
?>