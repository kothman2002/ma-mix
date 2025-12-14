<?php
require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = $_POST["name"];
    $phone   = $_POST["phone"];
    $email   = $_POST["email"];
    $message = $_POST["message"];

    $stmt = $conn->prepare("
        INSERT INTO messages (name, phone, email, message)
        VALUES (?, ?, ?, ?)
    ");

    if (!$stmt) {
        header("Location: /contact.php?contact=error");
        exit;
    }

    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    if ($stmt->execute()) {
        header("Location: /contact.php?contact=success");
        exit;
    } else {
        header("Location: /contact.php?contact=error");
        exit;
    }
}
