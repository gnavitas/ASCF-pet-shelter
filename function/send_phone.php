<?php 
include "../db/db_con.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if (isset($_POST["contact"])) {
    $phone = $_POST["contact"];
    sendPhone($phone);
  }

function generateCode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

function storeCode($phone, $code) {
   
    $conn = mysqli_connect('localhost', 'root', '', 'marilao');
    // $conn = mysqli_connect('localhost', 'root', '', 'cap-pas');

    // Prepare the SELECT statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM verify_phone WHERE phone = ?");
    mysqli_stmt_bind_param($stmt, "s", $phone);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
        // Code is correct
        
        // Prepare the DELETE statement
        $stmt = mysqli_prepare($conn, "DELETE FROM verify_phone WHERE phone = ?");
        mysqli_stmt_bind_param($stmt, "s", $phone);
        mysqli_stmt_execute($stmt);

        // Prepare the INSERT statement
        $stmt = mysqli_prepare($conn, "INSERT INTO verify_phone (phone, code, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
        mysqli_stmt_bind_param($stmt, "ss", $phone, $code);
        mysqli_stmt_execute($stmt);
        
    } else {
        // Prepare the INSERT statement
        $stmt = mysqli_prepare($conn, "INSERT INTO verify_phone (phone, code, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
        mysqli_stmt_bind_param($stmt, "ss", $phone, $code);
        mysqli_stmt_execute($stmt);
    }
    
    // Close the connection
    mysqli_close($conn);
}


  


function sendPhone($phone) {
    $code = generateCode();
    storeCode($phone, $code);
    
    $ch = curl_init(); 
    $parameters = array(
        'apikey' => 'eb3979fb886e3264fe4f6f55e0e76e2b-e3b8841c-18b1-4bd8-80bc-b8432b10fa5c', 
        'number' => ''.$phone.'',
        'message' => 'Hello! Your OTP is - '.$code.'', 
        'sendername' => 'ASCF'
    );
    curl_setopt($ch, CURLOPT_URL, 'https://pplw1v.api.infobip.com/sms/2/text/advanced');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    // Send the parameters set above with the request
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);

    }
    curl_close($ch);
    exit;
}
?>