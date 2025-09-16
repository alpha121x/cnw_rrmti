<?php
// $host = "172.20.82.25";
// $port = "5432";
// $dbname = "db_cnw_rrmti_lms";
// $user = "postgres";
// $password = "diamondx";

$host = "localhost";
$port = "5433";
$dbname = "db_cnw_rrmti_lms";
$user = "postgres";
$password = "1234";

try {

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    $conn = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    // Connection successful
//     echo "Database connected successfully";

} catch (PDOException $e) {
    // Connection failed
    die("Database connection failed: " . htmlspecialchars($e->getMessage()));
}
