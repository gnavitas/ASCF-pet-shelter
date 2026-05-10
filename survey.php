<script>
    function validateForm() {
        var evalFields = ["eval1", "eval2", "eval3", "eval4", "eval5"];
        var textFields = ["comments", "address"];
        var fileFields = ["ci_image"];
        var allFieldsEmpty = true;

        evalFields.forEach(function(field) {
            var value = document.getElementById(field).value.trim();
            if (value !== "") {
                allFieldsEmpty = false;
                return;
            }
        });

        textFields.forEach(function(field) {
            var value = document.getElementById(field).value.trim();
            if (value !== "") {
                allFieldsEmpty = false;
                return;
            }
        });

        fileFields.forEach(function(field) {
            var file = document.getElementById(field).files[0];
            if (file) {
                allFieldsEmpty = false;
                return;
            }
        });

        // Check if any required field is empty
        if (allFieldsEmpty) {
            document.getElementById("error-msg").innerText = "All text boxes, list boxes, and image must not be empty to submit";
            return false;
        } else {
            document.getElementById("error-msg").innerText = ""; // Clear previous error message
            return true;
        }
    }
</script>


<?php
// Initialize $remarks and $ci_image variables
$remarks = "";
$ci_image = "";

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marilao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $ci_validator_name = $_POST['ci_validator']; // Retrieve the text directly
    $reference_no = $_POST['reference_no'];
    $fullname = $_POST['fullname'];
    $eval1 = $_POST['eval1'];
    $eval2 = $_POST['eval2'];
    $eval3 = $_POST['eval3'];
    $eval4 = $_POST['eval4'];
    $eval5 = $_POST['eval5'];
    $comments = $_POST['comments'];
    $address = $_POST['address'];

    // Check if any of eval1 through eval5 is "No"
    if ($eval1 == "No" || $eval2 == "No" || $eval3 == "No" || $eval4 == "No" || $eval5 == "No") {
        $remarks = "warning";
    } else {
        $remarks = "passed";
    }

    // Handle CI Image upload
    $ci_image = $_FILES['ci_image']['name']; // Get the name of the uploaded file
    $ci_image_tmp = $_FILES['ci_image']['tmp_name']; // Get the temporary location of the uploaded file

    // Move the uploaded file to the desired location
    $upload_path = "uploads/"; // Specify the upload directory
    move_uploaded_file($ci_image_tmp, $upload_path . $ci_image);

    // Update record in the ci table
    $sql = "UPDATE ci SET ci_validator='$ci_validator_name', fullname='$fullname', eval1='$eval1', eval2='$eval2', eval3='$eval3', eval4='$eval4', eval5='$eval5', ci_image='$ci_image', comments='$comments', address='$address', remarks='$remarks' WHERE reference_no='$reference_no'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve data from URL parameters
$id = $_GET['id'];
$reference_no = $_GET['reference_no'];
$fullname = $_GET['fullname'];
$ci_validator = $_GET['ci_validator']; // Added for CI Validator
$eval1 = $_GET['eval1'];
$eval2 = $_GET['eval2'];
$eval3 = $_GET['eval3'];
$eval4 = $_GET['eval4'];
$eval5 = $_GET['eval5'];
$comments = $_GET['comments'];
$address = $_GET['address'];
$schedule = $_GET['schedule'];
$datetime = $_GET['datetime'];

// Fetch CI Validators from admin_info table
$sql = "SELECT id, CONCAT(firstname, ' ', lastname) AS full_name FROM admin_info WHERE CONCAT(firstname, ' ', lastname) <> ''"; // Excluding records with blank names
$result = $conn->query($sql);
$ci_validators = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ci_validators[] = $row;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>ASCF Questions:</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8"><path fill="%23333" d="M6 8L0 0h12z"/></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 12px);
            background-position-y: center;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
      
            background-color:  maroon;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

          /* New CSS styles for navigation bar */
          nav {
            background-color: maroon;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 14px 10px;
        }

        nav a:hover {
  
        }

        .sign-out {
            color: #fff;
            text-decoration: none;
            padding: 14px 10px;
        }

        .sign-out:hover {
            
        }
    </style>

<nav>
    <div>
    <a href="ci_sched.php"><img src="images/logo.png" style="max-width:40px;"></img></a>


    </div>
    <a href="ci.php" class="sign-out">Sign Out</a>

   
</nav><br><br>
    <h2>Details</h2>

    
    <form method="post" enctype="multipart/form-data">

    <script>
        function validateForm() {
            var ciValidator = document.getElementById("ci_validator").value;
            var referenceNo = document.getElementById("reference_no").value;
            var comments = document.getElementById("comments").value;
            var address = document.getElementById("address").value;

            // Check if any required field is empty
            if (ciValidator === "" || referenceNo === "" || comments === "" || address === "") {
                document.getElementById("error-msg").innerText = "All text boxes and list boxes must not be empty to submit";
                return false;
            }
            return true;
        }
    </script>
        <label for="ci_validator">CI Validator:</label><br>
        <select id="ci_validator" name="ci_validator">
            <?php foreach ($ci_validators as $validator): ?>
                <option value="<?php echo $validator['full_name']; ?>" <?php if ($validator['full_name'] == $ci_validator) echo "selected"; ?>><?php echo $validator['full_name']; ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="reference_no">Reference No:</label><br>
        <input type="text" id="reference_no" name="reference_no" value="<?php echo $reference_no; ?>" readonly><br>
        
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" readonly><br>
        
        <!-- Other fields here -->
        
                <label for="eval1">
        Is there enough space for the pet? </label><br>
        <select id="eval1" name="eval1">
            <option value="Yes" <?php if ($eval1 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval1 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval2">Have a good place to sleep for the pet?</label><br>
        <select id="eval2" name="eval2">
            <option value="Yes" <?php if ($eval2 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval2 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval3">
        Is the pet's body healthy?
        </label><br>
        <select id="eval3" name="eval3">
            <option value="Yes" <?php if ($eval3 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval3 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval4">Have you seen the pet behave well?</label><br>
        <select id="eval4" name="eval4">
            <option value="Yes" <?php if ($eval4 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval4 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval5">Has it seen good care since it was adopted?</label><br>
        <select id="eval5" name="eval5">
            <option value="Yes" <?php if ($eval5 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval5 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="ci_image">CI Image:</label><br>
        <input type="file" id="ci_image" name="ci_image"><br>
        
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"><?php echo $comments; ?></textarea><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address"><?php echo $address; ?></textarea><br>
        
        <!-- Other fields here -->
        <center>
        <button id="submitBtn" type="submit" class="btn btn-primary btn-block">Submit</button>
            </center>
    </form>

  
   <script>
    function validateForm() {
        var evalFields = ["eval1", "eval2", "eval3", "eval4", "eval5"];
        var textFields = ["comments", "address"]; // Add other text fields here if needed
        var allFieldsEmpty = true;

        evalFields.forEach(function(field) {
            var value = document.getElementById(field).value.trim();
            console.log("Value of " + field + ": " + value); // Debugging
            if (value !== "") {
                allFieldsEmpty = false;
                return;
            }
        });

        textFields.forEach(function(field) {
            var value = document.getElementById(field).value.trim();
            console.log("Value of " + field + ": " + value); // Debugging
            if (value !== "") {
                allFieldsEmpty = false;
                return;
            }
        });

        if (allFieldsEmpty) {
            document.getElementById("submitBtn").disabled = true;
        } else {
            document.getElementById("submitBtn").disabled = false;
        }

        return true;
    }
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
