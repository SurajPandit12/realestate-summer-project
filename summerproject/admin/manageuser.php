<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                        <li><a href="manageuser.php">ManageUsers</a></li>
                        <li><a href="../home.html">Logout</a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    </header>

<body>
    <h1>Admin User Panel</h1>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>user Name</th>
                <th>email</th>
                <th>password</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['password']}</td>
                           
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='22'>No users found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
