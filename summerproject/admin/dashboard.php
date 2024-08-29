<?php include('session_check.php'); ?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example queries for dashboard metrics
$sql_total_properties = "SELECT COUNT(*) AS total_properties FROM properties";
$sql_total_users = "SELECT COUNT(*) AS total_users FROM register";
$sql_recent_contacts = "SELECT * FROM contacts ORDER BY submitted_at DESC LIMIT 5";

$result_total_properties = $conn->query($sql_total_properties);
$result_total_users = $conn->query($sql_total_users);
$result_recent_contacts = $conn->query($sql_recent_contacts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&amp;display=swap" rel="stylesheet">
    <style>
        .light-gray {
            background-color: rgb(124, 114, 114);
        }
        .dashboard-link {
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        .dashboard-link:hover {
            color: #007bff;
        }
        .dashboard-box {
            padding: 3rem;
            transition: background-color 0.3s;
        }
        .dashboard-box:hover {
            background-color: #e0e0e0;
        }
        .dashboard-header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .dashboard-section {
            padding: 2rem;
            margin-bottom: 2rem;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .section-content {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <!-- Bootstrap JavaScript (optional, for components that require JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <header class="dashboard-header">
        <h1>Welcome to Admin Dashboard</h1>
    </header>

    <header class="header">
        <nav class="navbar nav-1">
            <section class="flex">
                <a href="home.html" class="logo">
                    <i class="fa-sharp fa-solid fa-house fa-flip" style="color: #c4213a;"></i>
                    <h1>Welcome to My Admin</h1>
                </a>
            </section>
        </nav>

        <nav class="navbar nav-2">
            <section class="flex">
                <div id="menu-btn" class="fas fa-bars"></div>

                <div class="menu">
                    <ul>
                        <li><a href="dashboard.php">MyDashboard</a></li>
                        <li><a href="managelisting.php">ManageListings</a></li>
                        <li><a href="manageland.php">manageland</a></li>
                        <li><a href="admin_panel.php">Managecontact info</a></li>
                        <li><a href="../home.html">Logout</a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2 class="section-title">Total Properties</h2>
                    <p class="section-content">
                        <?php
                        if ($result_total_properties && $result_total_properties->num_rows > 0) {
                            $row = $result_total_properties->fetch_assoc();
                            echo $row['total_properties'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2 class="section-title">Total Users</h2>
                    <p class="section-content">
                        <?php
                        if ($result_total_users && $result_total_users->num_rows > 0) {
                            $row = $result_total_users->fetch_assoc();
                            echo $row['total_users'];
                        } else {
                            echo "0";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-section">
                    <h2 class="section-title">Recent Contacts</h2>
                    <ul class="section-content">
                        <?php
                        if ($result_recent_contacts && $result_recent_contacts->num_rows > 0) {
                            while ($row = $result_recent_contacts->fetch_assoc()) {
                                echo "<li>{$row['name']} - {$row['email']}</li>";
                            }
                        } else {
                            echo "<li>No recent contacts found</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
