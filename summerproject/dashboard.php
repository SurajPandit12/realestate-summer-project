<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "ncc";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = "User123"; // Simulating user's username

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Validate password (replace this with your actual password validation logic)
        // if ($user['password'] === $password) {
        //     $_SESSION['email'] = $email;
        //     $_SESSION['username'] = $user['username'];
        //     header("Location: dashboard.php");
        //     exit;
        // } else {
        //     echo "<script>alert('Invalid password. Please try again.');</script>";
        // }
    } else {
        // User not found in 'register' table
        echo "<script>alert('User not found. Please register first.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-info img {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
        }
        .logout a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .contact-icons {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .contact-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 25px;
            margin: 10px 0;
            border: 1px solid #25D366;
            background-color: #25D366;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .contact-button:hover {
            background-color: #21B864;
        }
        .contact-button i {
            margin-right: 10px;
        }
        .contact-button.viber {
            background-color: #6f3cad; /* Viber color */
            border-color: #6f3cad;
        }
        .contact-button.viber:hover {
            background-color: #5e3094;
        }
        .contact-button.call {
            background-color: #007bb6; /* Call color */
            border-color: #007bb6;
        }
        .contact-button.call:hover {
            background-color: #006aa3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <div class="profile-info">
            <img src="profile_picture.jpg" alt="Profile Picture" width="100">
            <div>
                <p>Hello, <?php echo htmlspecialchars($username); ?>!</p>
                <p>Your email: <?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?> has been registered</p>
            </div>
        </div>
        <div class="owner-info">
            <p>Property Owner: <?php echo "Suraj Pandit"; ?></p>
            <p>Contact <?php echo "Suraj Pandit"; ?> for more information about the property.</p>
        </div>
        <hr/>
        <div class="contact-icons">
            <h4>You can buy this property by directly contacting with the owner</h4>
            <a href="https://wa.me/9863031182" target="_blank" class="contact-button"><i class="fab fa-whatsapp"></i>WhatsApp</a>
            <a href="viber://chat?number=9841166701" class="contact-button viber"><i class="fab fa-viber"></i>Viber</a>
            <a href="tel:9863031182" class="contact-button call"><i class="fas fa-phone"></i>Normal Call</a>
        </div>
        <hr/>
        <div class="logout">
            <a href="home.html"><h2>Return to Home</h2></a>
        </div>
    </div>
</body>
</html>
