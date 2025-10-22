<?php
session_start();

// Hardcoded admin credentials
define('ADMIN_USERNAME', 'admin');   // change as you like
define('ADMIN_PASSWORD', 'KupalsiJude123'); // change as you like

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check credentials
    if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
        // Set session variables
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        // Redirect to admin dashboard
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Login - K-Drama Recommendations</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    margin: 0;
                    padding: 0;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: #333;
                    min-height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .login-container {
                    background: white;
                    border-radius: 15px;
                    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
                    padding: 40px;
                    max-width: 400px;
                    width: 100%;
                    text-align: center;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .login-container:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 12px 35px rgba(0,0,0,0.3);
                }
                h2 {
                    margin-bottom: 20px;
                    color: #333;
                    font-size: 2em;
                }
                .login-form {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                }
                .login-form input {
                    padding: 12px 15px;
                    border: 1px solid #ccc;
                    border-radius: 25px;
                    font-size: 16px;
                    transition: border-color 0.3s ease, box-shadow 0.3s ease;
                }
                .login-form input:focus {
                    outline: none;
                    border-color: #667eea;
                    box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
                }
                .login-form button {
                    background: linear-gradient(135deg, #667eea, #764ba2);
                    color: white;
                    border: none;
                    padding: 12px 20px;
                    border-radius: 25px;
                    font-size: 16px;
                    font-weight: bold;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }
                .login-form button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
                    background: linear-gradient(135deg, #5a67d8, #6b46c1);
                }
                .error {
                    color: red;
                    margin-top: 10px;
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h2>Admin Login</h2>
                <form class="login-form" method="POST" action="admin.php">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="admin_login">Login</button>
                </form>
                <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            </div>
        </body>
        </html>
       