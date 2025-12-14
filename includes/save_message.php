<?php
require_once __DIR__ . "/db.php";
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["status" => "error"]);
    exit;
}

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$phone   = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare(
    "INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)"
);

if (!$stmt) {
    echo json_encode(["status" => "error"]);
    exit;
}

$stmt->bind_param("ssss", $name, $email, $phone, $message);

echo json_encode([
    "status" => $stmt->execute() ? "success" : "error"
]);
