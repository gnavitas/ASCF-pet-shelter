<?php
// Include database connection
include "./db/db_con.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $type_of_report = $_POST['type_of_report'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Upload image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["report_image"]["name"]);
    move_uploaded_file($_FILES["report_image"]["tmp_name"], $target_file);

    // Prepare and execute SQL insert statement
    $stmt = $conn->prepare("INSERT INTO abuse_report (email, type_of_report, description, address, latitude, longitude, report_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssbs", $email, $type_of_report, $description, $address, $latitude, $longitude, $target_file);
    $stmt->execute();

    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        echo "Report submitted successfully!";
    } else {
        echo "Error submitting report: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
