<?php
session_start();
require_once __DIR__ . '/connection/connection.php'; // secure include

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        $sql = "SELECT id, monitoring_user_id, monitoring_user_type_id, district_id, district,
                       designation, display_name, username, user_password
                FROM public.tbl_users
                WHERE username = :username
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

//            echo($row);
//            return;

            // Verify password (assuming user_password column is hashed)
            if ($password === $row['user_password']) {

                // Authentication successful → set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['display_name'] = $row['display_name'];
                $_SESSION['user_type_id'] = $row['monitoring_user_type_id'];
                $_SESSION['district_id'] = $row['district_id'];
                $_SESSION['district'] = $row['district'];
                $_SESSION['designation'] = $row['designation'];

                // Redirect to dashboard
                header("Location: ../dashboard.php?page=dashboard");
                exit;
            } else {
                // Wrong password
                $error = "Invalid username or password";
                header("Location: ../index.php?error=" . urlencode($error));
                exit;
            }
        } else {
            // Username not found
            $error = "Invalid username or password";
            header("Location: ../index.php?error=" . urlencode($error));
            exit;
        }

    } catch (PDOException $e) {
        // Log actual error but show generic message to user
        error_log("Login error: " . $e->getMessage());
        $error = "An error occurred. Please try again later.";
        header("Location: ../index.php?error=" . urlencode($error));
        exit;
    }
}
