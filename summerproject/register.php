<?php
require('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $confirm_password = trim($_POST['c_pass']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Error: Invalid email format.'); window.location.href='register.html';</script>";
        exit;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Error: Passwords do not match.'); window.location.href='register.html';</script>";
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
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
        echo "<script>alert('Error: This email is already registered. Please use a different email.'); window.location.href='register.html';</script>";
    } else {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute() === false) {
            echo "<script>alert('Error: " . htmlspecialchars($stmt->error) . "'); window.location.href='register.html';</script>";
        } else {
            echo "<script>alert('Registration successful!'); window.location.href='login.html';</script>";
            exit();
        }
    }

    $stmt->close();
}

$conn->close();
?>
