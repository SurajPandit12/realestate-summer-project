<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Message sent successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
