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

// Fetch CI Validators from admin_info table excluding records with blank names
$sql = "SELECT id, CONCAT(firstname, ' ', lastname) AS full_name FROM admin_info WHERE CONCAT(firstname, ' ', lastname) <> ''";
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
    <title>Survey</title>
</head>
<body>
    <h2>Survey Details</h2>
    <form method="post" enctype="multipart/form-data">
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
        
        <label for="eval1">Eval 1:</label><br>
        <select id="eval1" name="eval1">
            <option value="Yes" <?php if ($eval1 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval1 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval2">Eval 2:</label><br>
        <select id="eval2" name="eval2">
            <option value="Yes" <?php if ($eval2 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval2 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval3">Eval 3:</label><br>
        <select id="eval3" name="eval3">
            <option value="Yes" <?php if ($eval3 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval3 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval4">Eval 4:</label><br>
        <select id="eval4" name="eval4">
            <option value="Yes" <?php if ($eval4 == "Yes") echo "selected"; ?>>Yes</option>
            <option value="No" <?php if ($eval4 == "No") echo "selected"; ?>>No</option>
        </select><br>
        
        <label for="eval5">Eval 5:</label><br>
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
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
