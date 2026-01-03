<?php
$conn = new mysqli(
  "fdb1032.awardspace.net",
  "4716748_productsdb",
  "hasan_222",
  "4716748_productsdb"
);

if ($conn->connect_error) {
  die("Database connection failed");
}
?>

