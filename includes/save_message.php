<?php
require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /contact.php");
    exit;
}

// get values safely
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$phone   = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

// prepare insert
$sql = "INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: /contact.php?contact=error");
    exit;
}

$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    header("Location: /contact.php?contact=success");
    exit;
} else {
    header("Location: /contact.php?contact=error");
    exit;
}
