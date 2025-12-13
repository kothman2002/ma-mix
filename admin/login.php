<?php
session_start();
require_once "../includes/db.php";

$error = "";

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch admin user
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $admin = $result->fetch_assoc();

        // Simple password check (no hashing)
        if ($password === $admin['password']) {

            $_SESSION['admin'] = $admin['username'];
            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Incorrect password.";
        }

    } else {
        $error = "Username not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>M A MIX - Admin Login</title>
<link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d0d0d, #0a1a2a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .login-card {
            background: #111827;
            border-radius: 12px;
            padding: 35px;
            width: 380px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
            animation: fadeIn 0.8s ease-in-out;
        }

        .login-card h3 {
            text-align: center;
            color: #3b82f6;
            margin-bottom: 25px;
        }

        .form-control {
            background: #1f2937;
            border: 1px solid #374151;
            color: #fff;
        }

        .form-control:focus {
            background: #1f2937;
            border-color: #3b82f6;
            box-shadow: none;
            color: #fff;
        }

        .btn-login {
            background: #3b82f6;
            border: none;
        }

        .btn-login:hover {
            background: #1e40af;
        }

        .error-box {
            background: #dc2626;
            color: #fff;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="login-card">

        <h3>M A MIX Admin Login</h3>

        <!-- Error message -->
        <?php if ($error): ?>
            <div class="error-box"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-login w-100 mt-2">Login</button>

        </form>

    </div>

</body>

</html>
