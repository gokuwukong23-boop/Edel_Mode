<?php
session_start();
include 'db_connect.php'; // Must create $pdo with PDO connection

// Simple authentication
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Get user ID
if (!isset($_GET['id'])) {
    header("Location: admin_panel.php");
    exit();
}

$id = (int)$_GET['id'];

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: admin_panel.php");
    exit();
}

// Handle Update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // If password is filled, hash it; else, keep old password
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $email, $password, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
    }

    header("Location: admin_panel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f4f4; padding: 50px; }
        .form-container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 20px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 25px; border: 1px solid #ccc; }
        button { width: 100%; padding: 12px; border: none; border-radius: 25px; background: #667eea; color: white; font-size: 16px; cursor: pointer; }
        button:hover { background: #5a67d8; }
        a { display: block; text-align: center; margin-top: 15px; color: #333; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" value="<?= htmlspecialchars($user['name']) ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($user['email']) ?>" required>
            <input type="password" name="password" placeholder="New Password (leave blank to keep current)">
            <button type="submit" name="update_user">Update User</button>
        </form>
        <a href="admin_panel.php">Back to Dashboard</a>
    </div>
</body>
</html>
