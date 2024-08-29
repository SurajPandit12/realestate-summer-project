<?php
session_start();

// Placeholder for actual user data validation
$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'suraj' && $password === '123') {
    $_SESSION['admin_authenticated'] = true;
    header('Location: dashboard.php');
    exit();
} else {
    header('Location: login.html?error=invalid_credentials');
    exit();
}
?>
