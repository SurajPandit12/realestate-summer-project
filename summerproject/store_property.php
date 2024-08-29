<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ncc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//File upload handling
$upload_dir = "uploads/";
$file_paths = [];

if (!empty($_FILES['property_images']['name'][0])) {
    foreach ($_FILES['property_images']['name'] as $key => $value) {
        $file_tmp = $_FILES['property_images']['tmp_name'][$key];
        $file_name = basename($_FILES['property_images']['name'][$key]);
        $file_path = $upload_dir . $file_name;
        
        if (move_uploaded_file($file_tmp, $file_path)) {
            $file_paths[] = $file_path;
        } else {
            echo "Failed to upload file: " . $file_name;
            exit();
        }
    }
}

$property_images = implode(",", $file_paths);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO properties (property_name, location, price, owner, property_type, offer_type, rooms, deposit_amount, status, bedrooms, bathrooms, balcony, carpet_area, age, room_floor, total_floors, furnished, loan, facilities, property_images, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssiiiisssssss",
    $property_name,
    $location,
    $price,
    $owner,
    $property_type,
    $offer_type,
   
    $rooms,
    $deposit_amount,
    $status,
    $bedrooms,
    $bathrooms,
    $balcony,
    $carpet_area,
    $age,
    $room_floor,
    $total_floors,
    $furnished,
    $loan,
    $facilities,
    $property_images,
    $description
);

// Set parameters and execute
$property_name = $_POST['property_name'];
$location = $_POST['location'];
$price = $_POST['price'];
$owner = $_POST['owner'];
$property_type = $_POST['property_type'];
$offer_type = $_POST['offer_type'];
$description = $_POST['description'];
$rooms = $_POST['rooms'];
$deposit_amount = $_POST['deposit_amount'];
$status = $_POST['status'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$balcony = $_POST['balcony'];
$carpet_area = $_POST['carpet_area'];
$age = $_POST['age'];
$room_floor = $_POST['room_floor'];
$total_floors = $_POST['total_floors'];
$furnished = $_POST['furnished'];
$loan = $_POST['loan'];
$facilities = implode(", ", $_POST['facilities']);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
