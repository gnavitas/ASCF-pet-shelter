<?php
$sname = "localhost";
$uname = "u688796733_masacf";
$password = "Marilawan123!";
$db_name = "u688796733_masacf";

// Establish connection
$conn = mysqli_connect($sname, $uname, $password, $db_name);

// Check connection
if (!$conn) {
    echo "Connection failed to database!";
}

// Initialize variables for search filter
$search_fullname = isset($_GET['fullname']) ? mysqli_real_escape_string($conn, $_GET['fullname']) : '';
$search_payment_status = isset($_GET['payment_status']) ? mysqli_real_escape_string($conn, $_GET['payment_status']) : '';
$search_date_paid = isset($_GET['date_paid']) ? mysqli_real_escape_string($conn, $_GET['date_paid']) : '';

// Construct the SQL query with search filters
$query = "SELECT id, reference_no, fullname, payment_reference_no, payment_status, payment_amount, date_paid FROM payment WHERE 1";

if (!empty($search_fullname)) {
    $query .= " AND fullname LIKE '%$search_fullname%'";
}

if (!empty($search_payment_status)) {
    $query .= " AND payment_status = '$search_payment_status'";
}

if (!empty($search_date_paid)) {
    $query .= " AND date_paid = '$search_date_paid'";
}

$query .= " ORDER BY date_paid DESC LIMIT 10";

$result = mysqli_query($conn, $query);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Reference No</th>
                <th>Fullname</th>
                <th>Payment Reference No</th>
                <th>Payment Status</th>
                <th>Payment Amount</th>
                <th>Date Paid</th>
            </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['reference_no']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['payment_reference_no']}</td>
                <td>{$row['payment_status']}</td>
                <td>{$row['payment_amount']}</td>
                <td>{$row['date_paid']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the connection
mysqli_close($conn);
?>
