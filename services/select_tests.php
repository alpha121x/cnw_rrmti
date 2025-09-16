<?php
include 'connection/connection.php';

$result = $conn->query("SELECT id, test_name ||' '||test_code as test_name,sec_id,sub_sec_id  FROM public.tbl_testings where sec_id = 1");
$features=[];
foreach($result AS $row) {
    array_push($features, $row);
}
echo json_encode($features);
?>
