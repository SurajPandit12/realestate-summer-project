<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Optional: Add your own CSS styles here -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
                        <li><a href="admin_panel.php">ManageContact info</a></li>
                        <li><a href="../home.html">Logout</a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    </header>
    <div class="container">
        <h2>Admin Panel</h2>
        
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

        $sql = "SELECT id, name, email, number, message, submitted_at FROM contacts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["id"] . '</td>
                        <td>' . $row["name"] . '</td>
                        <td>' . $row["email"] . '</td>
                        <td>' . $row["number"] . '</td>
                        <td>' . $row["message"] . '</td>
                        <td>' . $row["submitted_at"] . '</td>
                        <td>
                            <form action="delete_contact.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>';
            }
            echo '</tbody>
                </table>';
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        
    </div>
    
    <!-- Link Bootstrap JavaScript (optional, for components that require JS) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Your custom JavaScript files (if any) -->
</body>
</html>
