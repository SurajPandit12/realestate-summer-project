<?php
require('connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $redirect = isset($_POST['redirect']) ? trim($_POST['redirect']) : 'home.html';

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, username, password FROM register WHERE email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $email);
    if ($stmt->execute() === false) {
        die("Execute failed: " . htmlspecialchars($stmt->error));
    }

    $result = $stmt->get_result();
    if ($result === false) {
        die("Get result failed: " . htmlspecialchars($stmt->error));
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Validate the password (no hashing)
        if ($password === $stored_password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login successful!'); window.location.href='$redirect';</script>";
            exit();
        } else {
            echo "<script>alert('Error: Incorrect password.'); window.location.href='login.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Error: No account found with that email.'); window.location.href='login.html';</script>";
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
