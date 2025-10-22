<?php
session_start();
include 'db_connect.php'; // Must create $pdo with PDO connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - K-Drama Recommendations</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        overflow: hidden;
    }

    .login-container {
        position: relative;
        background: white;
        border-radius: 20px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        padding: 50px 40px;
        width: 100%;
        max-width: 400px;
        text-align: center;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, #ff6b6b, #ffa500, #667eea, #764ba2);
        animation: rotate 8s linear infinite;
        z-index: -1;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg);}
        100% { transform: rotate(360deg);}
    }

    h2 {
        font-size: 2em;
        margin-bottom: 30px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    input {
        padding: 15px 20px;
        border-radius: 25px;
        border: 1px solid #ccc;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 15px rgba(102,126,234,0.5);
    }

    button {
        padding: 15px;
        border: none;
        border-radius: 25px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
    }

    .error-msg {
        color: #dc3545;
        font-weight: 600;
        margin-bottom: 10px;
        animation: shake 0.3s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
    }

    .back-link {
        margin-top: 15px;
        display: inline-block;
        text-decoration: none;
        color: #667eea;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: #5a67d8;
    }
</style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(isset($error)) echo "<div class='error-msg'>$error</div>"; ?>
        <form method="POST" action="login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="signup.php" class="back-link">Don't have an account? Sign Up</a>
    </div>
</body>
</html>
