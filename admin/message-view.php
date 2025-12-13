<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once "../includes/db.php";

if (!isset($_GET['id'])) {
    die("Message ID is missing.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM messages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Message not found.");
}

$message = $result->fetch_assoc();

// include layout
include "layout.php";
?>

<h2 class="mb-4 text-primary">Message Details</h2>

<div class="card shadow" style="background:#ffffff; border:1px solid #e5e7eb;">
    <div class="card-body">

        <p><strong class="text-primary">Name:</strong> <?= $message['name']; ?></p>
        <p><strong class="text-primary">Email:</strong> <?= $message['email']; ?></p>
        <p><strong class="text-primary">Phone:</strong> <?= $message['phone']; ?></p>
        <p><strong class="text-primary">Message:</strong><br>
            <?= nl2br($message['message']); ?>
        </p>
        <p><strong class="text-primary">Date:</strong> <?= $message['created_at']; ?></p>

        <a href="messages.php" class="btn btn-secondary me-2">
            ← Back
        </a>

        <a href="delete.php?id=<?= $message['id']; ?>"
           class="btn btn-danger"
           onclick="return confirm('Are you sure you want to delete this message?');">
            🗑 Delete
        </a>

    </div>
</div>

</body>
</html>
