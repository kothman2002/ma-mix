<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M A MIX Admin</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            color: #000;
            margin: 0;
            overflow-x: hidden;
            font-family: "Segoe UI", sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #0f172a;
            border-right: 1px solid #1e293b;
            padding-top: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #94a3b8;
            padding: 14px 25px;
            text-decoration: none;
            font-size: 1rem;
            border-radius: 6px;
            margin: 5px 10px;
        }

        .sidebar a i {
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e3a8a;
            color: #fff;
        }

        /* MAIN CONTENT */
        .content-area {
            margin-left: 260px;
            padding: 40px;
            min-height: 100vh;
        }

    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar text-center p-3">

    <img src="../public/assets/img/logo.png" 
         alt="M A MIX Logo" 
         style="width:130px; margin-bottom:20px; filter: drop-shadow(0 0 3px rgba(0,0,0,0.2));">

    <a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a href="messages.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'messages.php' ? 'active' : '' ?>">
        <i class="fa-solid fa-envelope"></i> Messages
    </a>

    <a href="logout.php">
        <i class="fa-solid fa-right-from-bracket"></i> Logout
    </a>
</div>

<!-- MAIN CONTENT -->
<div class="content-area">
