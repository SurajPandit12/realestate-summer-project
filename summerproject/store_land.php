<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $land_name = $_POST['land_name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $owner = $_POST['owner'];
    $land_type = $_POST['land_type'];
    $description = $_POST['description'];

    // Create a connection to the database
    $conn = new mysqli('localhost', 'root', '', 'ncc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO lands (land_name, location, price, owner, land_type, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsss", $land_name, $location, $price, $owner, $land_type, $description);

    // Execute the statement
    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;

        // Handle file uploads
        $uploadDir = 'uploads/';
        $allowedTypes = array('jpg', 'png', 'jpeg', 'gif');

        foreach ($_FILES['land_images']['name'] as $key => $val) {
            $fileName = basename($_FILES['land_images']['name'][$key]);
            $targetFilePath = $uploadDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES['land_images']['tmp_name'][$key], $targetFilePath)) {
                    $stmt = $conn->prepare("INSERT INTO land_images (land_id, file_name) VALUES (?, ?)");
                    $stmt->bind_param("is", $last_id, $fileName);
                    $stmt->execute();
                }
            }
        }

        echo "Land information has been stored successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
