<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $stmt = $conn->prepare("
        INSERT INTO messages (name, phone, email, message)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    if ($stmt->execute()) {
header("Location: /contact.php?contact=success");
        exit;
    } else {
        header("Location: /contact.php?contact=error");
        exit;
    }
}
?>
