<?php
include "db.php";

$result = $conn->query("SELECT user_name, content, created_at FROM notices ORDER BY id DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
