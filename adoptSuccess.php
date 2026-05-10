<?php

include "./admin/includes/date_today.php";
include "naive_bayes/naivebayes.php";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Generate unique IDs for the adoption and reference numbers
  $adoptID = "adopt_" . uniqid();
  $reference_no = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));
  $payment_reference_no = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));

  // Get the user ID from the session
  session_start();
  $userID = $_SESSION['user_id'];

  // Get the adoption data from the form
  $pet_id = $_POST['pet_id'];
  $email = $_POST['email'];
  $fullName = $_POST['fullName'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];

  $current_datetime = $date_today;

  $pet_status = ($predicted_label  === "approved") ? "pending" : "pending_declined";
  $status = $predicted_label;
  // echo "Accuracy: " . $accuracy . "<br>";

  // Handle the ID file upload
  if (isset($_FILES['idFile'])) {

    $image_name = $_FILES['idFile']['name'];
    $image_tmp_name = $_FILES['idFile']['tmp_name'];
    $image_type = $_FILES['idFile']['type'];
    $image_size = $_FILES['idFile']['size'];
    $image_error = $_FILES['idFile']['error'];

    // Validate the uploaded images.
    if ($image_error === UPLOAD_ERR_OK) {
      // set allowed file types
      $allowed_types = ['image/jpeg', 'image/png'];

      // get file info
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $file_type = $finfo->file($_FILES['idFile']['tmp_name']);

      if (in_array($file_type, $allowed_types)) {

        $target_dir = "uploads/";
        $image_extension = pathinfo($_FILES["idFile"]["name"], PATHINFO_EXTENSION);
        $idFile = $target_dir . $adoptID . '_' . 'validID' . '.' . $image_extension;

        move_uploaded_file($image_tmp_name, $idFile);
      } else {
        // file type not allowed error page.
        header('Location: ../error.php');
      }
    }
  }

  // Handle the pet picture file upload
  if (isset($_FILES['picFile'])) {

    $image_name = $_FILES['picFile']['name'];
    $image_tmp_name = $_FILES['picFile']['tmp_name'];
    $image_type = $_FILES['picFile']['type'];
    $image_size = $_FILES['picFile']['size'];
    $image_error = $_FILES['picFile']['error'];

    // Validate the uploaded images.
    if ($image_error === UPLOAD_ERR_OK) {
      // set allowed file types
      $allowed_types = ['image/jpeg', 'image/png'];
      // get file info
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $file_type = $finfo->file($_FILES['picFile']['tmp_name']);

      if (in_array($file_type, $allowed_types)) {
        $target_dir1 = "uploads/";
        $target_dir2 = "admin/process/uploads/";
        $image_extension = pathinfo($_FILES["picFile"]["name"], PATHINFO_EXTENSION);
        $picFile = $target_dir1 . $adoptID . '_' . '1by1' . '.' . $image_extension;
        $picFile2 = $target_dir2 . $adoptID . '_' . '1by1' . '.' . $image_extension;

        move_uploaded_file($image_tmp_name, $picFile);
        copy($picFile, $picFile2);
      } else {
        // file type not allowed error page.
        header('Location: ../error.php');
      }
    }
  }

  // Handle the home picture file upload
  if (isset($_FILES['homeFiles'])) {

    $image_names = []; // initialize an array to store image names

    foreach ($_FILES['homeFiles']['tmp_name'] as $key => $tmp_name) {

      $image_name = $_FILES['homeFiles']['name'][$key];

      $image_tmp_name = $_FILES['homeFiles']['tmp_name'][$key];

      $image_type = $_FILES['homeFiles']['type'][$key];

      $image_size = $_FILES['homeFiles']['size'][$key];

      $image_error = $_FILES['homeFiles']['error'][$key];


      // Validate the uploaded images.
      if ($image_error === UPLOAD_ERR_OK) {

        // set allowed file types
        $allowed_types = ['image/jpeg', 'image/png'];

        // get file info
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $file_type = $finfo->file($_FILES['homeFiles']['tmp_name'][$key]);

        if (in_array($file_type, $allowed_types)) {

          $target_dir = "uploads/";
          $image_extension = pathinfo($_FILES["homeFiles"]["name"][$key], PATHINFO_EXTENSION);

          $homeFile = $target_dir . $adoptID . '_' . 'homeImage' . '_' . $key . '.' . $image_extension;

          move_uploaded_file($image_tmp_name, $homeFile);

          $image_names[] = $homeFile; // add image name to array

          $mysqli = new mysqli("localhost", "u688796733_masacf", "Marilawan123!", "u688796733_masacf");
        //   $mysqli = new mysqli("localhost", "root", "", "cap-pas");

          $stmt3 = $mysqli->prepare("INSERT INTO adoption_house (adoption_id, user_id, images) VALUES (?, ?, ?)");

          $stmt3->bind_param("sss", $adoptID, $userID, $homeFile);

          $stmt3->execute();

          $stmt3->close();
        } else {

          // file type not allowed error page.
          header('Location: ../error.php');
        }
      }
    }

    // serialize the array of image names and store it in the database
    $image_names_str = serialize($image_names);

    // insert $image_names_str into the appropriate column in the database
  }

  // Connect to the database
  $mysqli = new mysqli("localhost", "u688796733_masacf", "Marilawan123!", "u688796733_masacf");


  // Check for errors
  if ($mysqli->connect_errno) {

    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }


  // Prepare the SQL statements
  $stmt1 = $mysqli->prepare("INSERT INTO adoption_transaction (adoption_id, user_id, pet_id, reference_no, email, fullname, address, contact, valid_id, 1by1_id, datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $stmt2 = $mysqli->prepare("INSERT INTO pre_eval_user_answer (reference_no, user_id, existing_pet, vet_assistance, space_req, sleepingarea, living_arrangement, cage, leash, pens, feederer, properwaste) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // $stmt3 = $mysqli->prepare("INSERT INTO adoption_house (adoption_id, user_id, images) VALUES (?, ?, ?)");

  $stmt4 = $mysqli->prepare("INSERT INTO adoption_status (adoption_id, status, date_update, status_pending) VALUES (?, ?, ?, ?)");

  $stmt5 = $mysqli->prepare("INSERT INTO `adoption_schedule` (`adoption_id`, `date_of_schedule`, `time`) VALUES (?, ?, ?) ");

  $stmt6 = $mysqli->prepare("UPDATE pet_status ps
                              JOIN adoption_transaction at ON ps.pet_id = at.pet_id
                              JOIN adoption_status ast ON ast.adoption_id = at.adoption_id
                              SET ps.status = ?
                              WHERE at.adoption_id = ?");

  $stmt7 = $mysqli->prepare("INSERT INTO `payment` (`user_id`, `reference_no`, `fullname`, `payment_reference_no`, `payment_status`, `payment_amount` ) VALUES (?, ?, ?, ?, ?, ?) ");

  // Bind the parameters for the first statement
  $stmt1->bind_param("sssssssssss", $adoptID, $userID, $pet_id, $reference_no, $email, $fullName, $address, $contact, $idFile, $picFile, $current_datetime);

  // Execute the first statement
  if ($stmt1->execute()) {

    // Bind the parameters for the second statement
    $stmt2->bind_param("ssssssssssss", $reference_no, $userID, $existing_pet, $vet_assistance, $space_req, $sleepingarea, $living_arrangement, $pens, $cage, $leash, $feederer, $properwaste);

    // Execute the second statement
    if ($stmt2->execute()) {
      $status_pending = "Pending";
      // Bind the parameters for the fourth statement
      $stmt4->bind_param("ssss", $adoptID, $status, $current_datetime, $status_pending);




      include './function/CheckBan.php';
      $ban = BanDecline($userID, $status);


      // Execute the fourth statement
      if ($stmt4->execute()) {

        // $curr_date_five = strtotime(' + 5 weekdays', time()); // add 5 weekdays instead of days
        // $curr_day = date('N', $curr_date_five); // get the day of the week (1 = Monday, 7 = Sunday)

        // // if the current day is Saturday (6) or Sunday (7), adjust the date accordingly
        // if ($curr_day >= 6) {
        //   $curr_date_five += (8 - $curr_day) * 86400; // add the number of seconds in a day times the number of days to the next Monday
        // }

        // $curr_date_five = date('Y-m-d', $curr_date_five);
        // include './function/CheckPetScheduleSlot.php';
        // $new_date = getNextAvailableDate($curr_date_five);
        // $new_slot = get_adoption_slot($new_date);

        date_default_timezone_set("Asia/Manila");
        $curr_date = date("Y-m-d");
        $curr_time = new DateTime("now", new DateTimeZone("Asia/Manila"));
        $curr_time_str = $curr_time->format("H:i:s");
        include './function/CheckPetScheduleSlot.php';
        $new_date = getNextAvailableDate($curr_date);
        $new_slot = get_adoption_slot($new_date);

        $stmt5->bind_param("sss", $adoptID, $new_date, $curr_time_str);


        if ($stmt5->execute()) {

          // Bind the parameters for the sixth statement
          $stmt6->bind_param("ss", $pet_status, $adoptID);
          if ($stmt6->execute()) {

            $payment_status = "To Pay";
            $payment_amount = 0;

            $stmt7->bind_param("ssssss", $userID, $reference_no, $fullName, $payment_reference_no, $payment_status, $payment_amount);

            if ($stmt7->execute()) {
              // echo "Adoption transaction successfully submitted!";
              $stmt7->close();
            } else {
              echo "Error: " . $stmt6->error;
            }
            // Close the sixth statement
            $stmt6->close();
          } else {
            echo "Error: " . $stmt6->error;
          }

          // Close the fifth statement
          $stmt5->close();
        } else {
          echo "Error: " . $stmt5->error;
        }

        // Close the fourth statement
        $stmt4->close();
      } else {

        echo "Error: " . $stmt4->error;
      }
    } else {

      echo "Error: " . $stmt2->error;
    }

    // Close the second statement
    $stmt2->close();
  } else {

    echo "Error: " . $stmt1->error;
  }

  // Close the first statement and the database connection
  $stmt1->close();
}

$stmt1 = $mysqli->prepare("SELECT 
    a.adoption_id, a.user_id, a.pet_id, a.reference_no, a.email, a.fullName, a.address, a.contact, a.datetime, p.* FROM adoption_transaction a 
    JOIN pet_details p 
    ON a.pet_id = p.pet_id 
    WHERE a.adoption_id = ?");


$stmt1->bind_param("s", $adoptID);

$stmt1->execute();

$result = $stmt1->get_result();

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();

  $adoption_id = $row['adoption_id'];

  $pet_id = $row['pet_id'];

  $reference_no = $row['reference_no'];

  $email = $row['email'];

  $fullName = $row['fullName'];

  $pet_name = $row['pet_name'];

  $pet_species = $row['pet_species'];
}




?>



<!DOCTYPE html>

<html lang="en">

<head>

  <?php
  include_once('head.php');
  ?>

  <link rel="stylesheet" href="css/adoptProcess.css">
</head>

<body>

  <?php
  include_once('navigation.php');
  ?>

  <main class="successfulProcess">
    <?php $row = mysqli_fetch_assoc($result); ?>
    <!-- <div class="header-img">
        <img src="images/Missing-1.png" alt="Pet header" />
        <i class="fas fa-check"></i>
      </div> -->
    <div class="header-info adopt-receipt-header">
      <h3>Your application has been submitted!</h3>
      <div>
        <p>
          Please always check your registered email and my account page for an
          update about your adoption request.
        </p>
      </div>
    </div>
    <div class="adoptSuccess">
      <h4>Transaction Details</h4>

      <div class="transactionDetail adopt-receipt-transacdet">
        <div>
          <p class="primary">Application ID:</p>
          <p><?php echo "<span class='pet-name'>" . $reference_no . "</span>"; ?></p>
        </div>
        <div>
          <p class="primary">Fullname:</p>
          <p><?php echo "<span class='pet-name'>" . $fullName . "</span>"; ?></p>
        </div>
        <div>
          <p class="primary">Email:</p>
          <p><?php echo $email; ?></p>
        </div>
        <div>
          <p class="primary">Status:</p>
          <!-- if need to update the pending to for interview status. -->
          <!-- <p><?php echo $status; ?></p> -->
          <p>Wait for email update.</p>
        </div>
        <!-- <div>
          <p class="primary">Amount to Pay: </p>
          <p>P 500</p>
        </div> -->
      </div>
      <div class="header-info adopt-receipt-headerInf">
        <h4>Pet Details</h4>
        <div>
          <div>
            <p class="primary">Pet ID:</p>
            <p><?php echo strtoupper($pet_id); ?></p>
          </div>
          <div>
            <p class="primary">Name:</p>
            <p><?php echo $pet_name; ?></p>
          </div>
          <div>
            <p class="primary">Species:</p>
            <p><?php echo $pet_species; ?></p>
          </div>
        </div>
      </div>
      <div class="formButtons adopt-receipt-buttons">
        <a href="myAccount.php?page=transaction&page_number=1" class="primary-button form-button">Transaction</a>
        <a href="index.php" class="form-button adoptCancel">Home</a>
      </div>
    </div>
  </main>
  <?php
  include_once('footer.php')
  ?>
  <script src="js/adoptProcess.js"></script>
</body>

</html>



<?php
// Include PHPMailer autoload file
require './function/PHPMailer/src/PHPMailer.php';
require './function/PHPMailer/src/SMTP.php';
require './function/PHPMailer/src/Exception.php';

// Create a new PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

// Configure SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  // Google's SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'YOUR_EMAIL@gmail.com'; // Your Gmail or Google Workspace email address
$mail->Password = 'YOUR_APP_PASSWORD'; // Your Gmail or Google Workspace password
$mail->Port = 587; // Port for TLS encryption

// Set From, To, Subject, and Body
$mail->setFrom('YOUR_EMAIL@gmail.com', 'Animal Shelter and Care Facility  Pet Shelter');
$mail->addAddress($email); // Add recipient email address
$mail->Subject = 'ASCF Adoption Confirmation';
$mail->Body = "
    Dear Adoptee,\n\n
    Thank you for your interest in adopting from the Animal Shelter and Care Facility (ASCF). We are excited to assist you in providing a loving home for one of our animals.\n\n
    Please note that there is no payment required for adoption. To confirm your adoption, kindly send us the reference code we provided. You can do this easily by clicking the \"Contact Us\" tab on our website and sending the message directly through the form, or by emailing us at YOUR_EMAIL@gmail.com.\n\n
    **Reference Number:** **$payment_reference_no**\n\n
    When sending your confirmation, please include the following details:\n
    - **Pet Name:**\n
    - **Pet Type (cat or dog):**\n
    - **Adoption Process Date:**\n\n
    Example:\n
    - Pet Name: Max\n
    - Pet Type: Dog\n
    - Adoption Process Date: November 23, 2024\n\n
    If you have any questions or need further assistance, feel free to reach out to us via the \"Contact Us\" tab or contact us at 093128732187.\n\n
    Thank you for your support and for opening your heart to a furry friend in need. Together, we can make a difference.\n\n
    Warm regards,\n\n
    ASCF Admin\n
    Animal Shelter and Care Facility\n
";



// Send the email
if (!$mail->send()) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email has been sent successfully';
}
?>
