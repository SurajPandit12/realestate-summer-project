<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Land</title>
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="../css/style.css">
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f4f4f4;
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }
      .container {
         max-width: 800px;
         margin: 25px auto;
         padding: 20px;
         background-color: #fff;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .header {
         text-align: center;
         margin-bottom: 30px;
      }
      .header h1 {
         font-size: 36px;
         color: #333;
         margin-bottom: 10px;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }
      th, td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
      }
      th {
         background-color: #f2f2f2;
      }
      tr:nth-child(even) {
         background-color: #f9f9f9;
      }
      .btn {
         display: inline-block;
         padding: 8px 16px;
         background-color: #c4213a;
         color: #fff;
         font-size: 16px;
         text-decoration: none;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }
      .btn:hover {
         background-color: #a31a2b;
      }
   </style>
</head>
<body><header class="header">
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
                        <li><a href="admin_panel.php">ManageContact info</a></li>
                        <li><a href="../home.html">Logout</a></li> 
                    </ul>
                </div>
            </section>
        </nav>
    </header>
   <div class="container">
      <header class="header">
         <h1>Manage Land</h1>
      </header>
      <table>
         <thead>
            <tr>
               <th>ID</th>
               <th>Land Name</th>
               <th>Location</th>
               <th>Price</th>
               <th>Owner</th>
               <th>Land Type</th>
               <th>Description</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            // Create a connection to the database
            $conn = new mysqli('localhost', 'root', '', 'ncc');

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }

            // Query to retrieve land information
            $sql = "SELECT * FROM lands";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
               // Output data of each row
               while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['land_name'] . "</td>";
                  echo "<td>" . $row['location'] . "</td>";
                  echo "<td>" . $row['price'] . "</td>";
                  echo "<td>" . $row['owner'] . "</td>";
                  echo "<td>" . $row['land_type'] . "</td>";
                  echo "<td>" . $row['description'] . "</td>";
                  echo '<td><a href="edit_land.php?id=' . $row['id'] . '" class="btn">Delete</a></td>';
                  echo "</tr>";
               }
            } else {
               echo "<tr><td colspan='8'>No land records found</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
         </tbody>
      </table>
   </div>
</body>
</html>
