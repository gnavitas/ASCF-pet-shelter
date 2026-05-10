
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Navigation Bar</title>


    <main>



    <style>
        /* Existing CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
     
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        form input[type="text"], form select, form button {
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr {
            background-color: #ddd;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
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

   
</nav>
<br><br>
   <?php
$servername = "localhost";
$username = "u688796733_masacf";
$password = "Marilawan123!";
$database = "u688796733_masacf";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Default SQL query to select all records from the ci table
$sql = "SELECT * FROM ci";

// Filter conditions
$filter = "";

if (isset($_POST['filter'])) {
    $search = $_POST['search'];

    if (!empty($search)) {
        $filter .= " WHERE fullname LIKE '%$search%' OR ci_status LIKE '%$search%' OR datetime LIKE '%$search%'";
    }

    // Final SQL query with filter
    $sql .= $filter;
}

$result = $conn->query($sql);

// Output search form
echo "<form method='post'>
        <input type='text' name='search' placeholder='Search'>
        <select name='filter'>
            <option value=''>Filter By</option>
            <option value='fullname'>Full Name</option>
            <option value='ci_status'>CI Status</option>
            <option value='datetime'>Date Time</option>
        </select>
        <button type='submit'>Search</button>
      </form>";

// Your existing code...

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>CI Validator</th>
                <th>Reference No</th>
                <th>Full Name</th>
                <th>CI Status</th>
                <th>Evaluation 1</th>
                <th>Evaluation 2</th>
                <th>Evaluation 3</th>
                <th>Evaluation 4</th>
                <th>Evaluation 5</th>
                <th>Comments</th>
                <th>Remarks</th>
                <th>Address</th>
                <th>Schedule</th>
                <th>Date Time</th>
                <th>Select</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["ci_validator"] . "</td>
                <td>" . $row["reference_no"] . "</td>
                <td>" . $row["fullname"] . "</td>
                <td>" . $row["ci_status"] . "</td>
                <td>" . $row["eval1"] . "</td>
                <td>" . $row["eval2"] . "</td>
                <td>" . $row["eval3"] . "</td>
                <td>" . $row["eval4"] . "</td>
                <td>" . $row["eval5"] . "</td>
                <td>" . $row["comments"] . "</td>
                <td>" . $row["remarks"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["schedule"] . "</td>
                <td>" . $row["datetime"] . "</td>";
        // Check if remarks are "passed"
        if ($row["remarks"] !== "passed") {
            echo "<td><a href='survey.php?id=" . $row["id"] . "&ci_validator=" . $row["ci_validator"] . "&reference_no=" . $row["reference_no"] . "&fullname=" . $row["fullname"] . "&ci_status=" . $row["ci_status"] . "&eval1=" . $row["eval1"] . "&eval2=" . $row["eval2"] . "&eval3=" . $row["eval3"] . "&eval4=" . $row["eval4"] . "&eval5=" . $row["eval5"] . "&comments=" . $row["comments"] . "&remarks=" . $row["remarks"] . "&address=" . $row["address"] . "&schedule=" . $row["schedule"] . "&datetime=" . $row["datetime"] . "'>Select</a></td>";
        } else {
            echo "<td></td>"; // If remarks are "passed", don't display the "Select" link
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>







    























    </main>
</body>
</html>
