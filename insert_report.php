<?php
// Start or resume the session
session_start();

// Include database connection
include "./db/db_con.php";

// Check if user_id session is set
if(isset($_SESSION['user_id'])) {
    // Get the user_id from the session
    $user_id = $_SESSION['user_id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO abuse_report (email, type_of_report, description, address, latitude, longitude, report_image, date_submitted, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
            $stmt->bind_param("ssssddsi", $email, $type_of_report, $description, $address, $latitude, $longitude, $report_image, $user_id);

            // Set parameters and execute
            $email = $_POST['email'];
            $type_of_report = $_POST['type_of_report'];
            $description = $_POST['description'];
            $address = $_POST['address'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            
            // Handle file upload
            $report_image = ""; // Initialize variable
            if(isset($_FILES['report_image']) && $_FILES['report_image']['error'] === UPLOAD_ERR_OK) {
                $report_image = $_FILES['report_image']['name'];
                move_uploaded_file($_FILES['report_image']['tmp_name'], "./uploads/" . $report_image);
            }

            // Execute prepared statement
            if ($stmt->execute()) {
                echo "<script>alert('Report submitted successfully.');</script>";
            } else {
                throw new Exception("Error: " . $stmt->error);
            }

            // Close statement
            $stmt->close();
        } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    }
} else {
    // Redirect the user to the login page or display an error message
    echo "<script>alert('User session not set.');</script>";
}

// Close connection
$conn->close();
?>
