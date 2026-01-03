<?php
// Database credentials
$host = "dpg-d5cpurqli9vc73cv2j80-a";
$port = 5432;
$db   = "lost_qd0g";
$user = "hasan";
$pass = "AobWu8xhasZRzEJkY31jucoR5REWxVub";

try {
    $conn = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Database connection failed: " . $e->getMessage()
    ]);
    exit;
}
