<?php
session_start();

// Protect page
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    die("Message ID missing.");
}

$id = $_GET['id'];

// Delete message
$sql = "DELETE FROM messages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect back
header("Location: dashboard.php");
exit;
