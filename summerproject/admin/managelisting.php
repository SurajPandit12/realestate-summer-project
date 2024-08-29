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

$sql = "SELECT * FROM properties";
$result = $conn->query($sql);
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
    </style>
</head>
<body>
    <!-- Bootstrap JavaScript (optional, for components that require JS) -->
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
                        <li><a href="admin_panel.php">Managecontact info</a></li>
                        <li><a href="../home.html">Logout</a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    </header>

    <div class="container">
        <h1>Admin Panel</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property Name</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Owner</th>
                    <th>Property Type</th>
                    <th>Offer Type</th>
                    <th>Rooms</th>
                    <th>Deposit Amount</th>
                    <th>Status</th>
                    <th>Bedrooms</th>
                    <th>Bathrooms</th>
                    <th>Balcony</th>
                    <th>Carpet Area</th>
                    <th>Age</th>
                    <th>Room Floor</th>
                    <th>Total Floors</th>
                    <th>Furnished</th>
                    <th>Loan</th>
                    <th>Facilities</th>
                    <th>Property Images</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['property_name']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['owner']}</td>
                                <td>{$row['property_type']}</td>
                                <td>{$row['offer_type']}</td>
                                <td>{$row['rooms']}</td>
                                <td>{$row['deposit_amount']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['bedrooms']}</td>
                                <td>{$row['bathrooms']}</td>
                                <td>{$row['balcony']}</td>
                                <td>{$row['carpet_area']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['room_floor']}</td>
                                <td>{$row['total_floors']}</td>
                                <td>{$row['furnished']}</td>
                                <td>{$row['loan']}</td>
                                <td>{$row['facilities']}</td>
                                <td>{$row['property_images']}</td>
                                <td>{$row['description']}</td>
                                <td>
                                    <form action='delete_property.php' method='post'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <button type='submit' class='btn btn-danger'>Delete</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='22'>No properties found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
