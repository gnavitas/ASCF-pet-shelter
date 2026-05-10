

<!DOCTYPE html>
<html>
<head>

    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Include Leaflet Control Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body>
 
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <title>Abuse Report Form</title>
                <h2>Abuse Report Form</h2>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="type_of_report">Type of Report:</label><br>
        <select id="type_of_report" name="type_of_report" required>
            <option value="">Select Type</option>
            <option value="Abused Animal">Abused Animal</option>
            <option value="Wild Animal">Wild Animal</option>
        </select><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" readonly required><br>
        
        <!-- Hidden inputs for latitude and longitude -->
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">
        
        <label for="report_image">Report Image:</label><br><br>
        <input type="file" id="report_image" name="report_image" accept="image/*" required><br>
        
        <!-- Map div -->
        <div id="map"></div><br>
        
        <input type="submit" value="Submit">    <br><br>
        <button onclick="window.location.href='adopt.php'">Back</button>

    </form>

    <!-- Include Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Include Leaflet Control Geocoder JS -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2); // Set initial view
        var marker;
        
        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Add search functionality to the map
        var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false // Prevent automatic marker addition
        }).addTo(map);

        // Update address textbox when the map marker is moved manually
        map.on('click', function(e) {
            geocoder.reverse(e.latlng, map.options.crs.scale(map.getZoom()), function(results) {
                if (results.length > 0) {
                    document.getElementById('address').value = results[0].name;
                    document.getElementById('latitude').value = e.latlng.lat;
                    document.getElementById('longitude').value = e.latlng.lng;
                }
            });
        });

        // Update address textbox when a location is selected from the search results
        geocoder.on('markgeocode', function(e) {
            var location = e.geocode.center;
            document.getElementById('address').value = e.geocode.name;
            document.getElementById('latitude').value = location.lat;
            document.getElementById('longitude').value = location.lng;
        });
    </script>
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
        // Prepare and bind parameters
        $report_id = uniqid('REPORT_');

        $stmt = $conn->prepare("INSERT INTO abuse_report (report_id, email, type_of_report, description, address, latitude, longitude, report_image, datetime, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("ssssssssi", $report_id, $email, $type_of_report, $description, $address, $latitude, $longitude, $report_image, $user_id);

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
            move_uploaded_file($_FILES['report_image']['tmp_name'], "./assets/" . $report_image);
        }

        // Execute prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Report submitted successfully.');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close statement
        $stmt->close();
    }
} else {
    // Redirect the user to the login page or display an error message
    // header("Location: login.php"); // Redirect to login page
    // exit; // Stop script execution
    echo "<script>alert('User session not set.');</script>";
}

// Close connection
$conn->close();
?>
</body>
</html>

 <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: maroon;
        }
        form {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="email"],
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        #map {
            height: 200px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
   
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             background-color: maroon;
        }
        
     
     
     button{
         width: 100%;
            padding: 10px;
   
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             background-color: maroon;
     }

     
     
     
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>