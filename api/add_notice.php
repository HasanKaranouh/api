<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$user_name = $data["user_name"] ?? "";
$content = $data["content"] ?? "";

if ($user_name == "" || $content == "") {
  echo json_encode(["success" => false]);
  exit;
}

$stmt = $conn->prepare("INSERT INTO notices (user_name, content) VALUES (?, ?)");
$stmt->bind_param("ss", $user_name, $content);

echo json_encode(["success" => $stmt->execute()]);
