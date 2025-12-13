<?php
require_once "includes/db.php";

// get values
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// insert
$sql = "INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);
$stmt->execute();

// return back to form with success flag
header("Location: index.php?sent=1");
exit;
