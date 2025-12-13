<?php
session_start();

// Destroy admin session
session_unset();
session_destroy();

// Redirect back to login page
header("Location: login.php");
exit;
