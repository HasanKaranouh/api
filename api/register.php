<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require "db.php";

// Read JSON body
$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"] ?? "";
$email = $data["email"] ?? "";
$password = $data["password"] ?? "";

if ($name === "" || $email === "" || $password === "") {
    echo json_encode(["success" => false, "message" => "Missing fields"]);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

// Postgres uses $1, $2, $3 for placeholders
$stmt = $conn->prepare(
    "INSERT INTO users (name, email, password) VALUES ($1, $2, $3)"
);

try {
    $success = $stmt->execute([$name, $email, $hash]);
    echo json_encode(["success" => $success]);
} catch (PDOException $e) {
    // Handle duplicate email or other errors
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
